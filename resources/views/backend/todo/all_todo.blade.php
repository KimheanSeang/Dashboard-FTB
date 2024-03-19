@extends('admin.todo.todo')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function navigateTo(url, type) {
            window.location.href = url;
            $('.todo-button button').removeClass('active');
            if (type === 'all' || type === 'done' || type === 'important' || type === 'low' || type === 'medium' || type ===
                'high') {
                $('.todo-button button.inbox-button').addClass('active');
            } else if (type === 'trash') {
                $('.todo-button button.trash-button').addClass('active');
            }
            // If the 'Done' filter is active and clicking 'Inbox', show all tasks
            if (type === 'done') {
                $('.task-row').show();
            }
        }

        function filterTasks(status) {
            $('.task-row').hide();
            if (status === 'Done') {
                $('.task-row input[name^="status_"][value="1"]').closest('.task-row').show();
            } else if (status === 'important') {
                $('.task-row').each(function() {
                    // Check if the task is not marked as important
                    if (!$(this).find('.star').is(':checked')) {
                        $(this).show();
                    }
                });
            } else if (status === 'low' || status === 'medium' || status === 'high') {
                $('.task-row select[name^="status_"]').each(function() {
                    if ($(this).val() === status) {
                        $(this).closest('.task-row').show();
                    }
                });
            }
        }
    </script>
    <div class="page-content">

        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper todo-1">
                <div class="card rounded">
                    <div class="card-body">
                        <div style="display: flex">
                            <h1 class="todo-h1">Todo list</h1>
                            @if (Auth::user()->can('export_task.menu'))
                                <div class="dropdown mb-2" style="margin-left: 15vh">
                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" class="">
                                        <i data-feather="download" style="color: rgb(197, 162, 6)"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                        @if (Auth::user()->can('ex_all.task'))
                                            <a class="dropdown-item d-flex align-items-center"
                                                style="color: rgb(197, 162, 6);" href="{{ route('export.all.task') }}">
                                                <i class="mdi mdi-download"
                                                    style="font-size: 2.4vh; margin-right: 5px;color: rgb(197, 162, 6);"></i>
                                                <span class="">Download All Task</span>
                                            </a>
                                        @endif
                                        @if (Auth::user()->can('ex_trash.task'))
                                            <a class="dropdown-item d-flex align-items-center"
                                                style="color: rgb(12, 77, 162);" href="{{ route('export.trash.task') }}">
                                                <i class="mdi mdi-export"
                                                    style="font-size: 2.4vh; margin-right: 5px;color: rgb(12, 77, 162);"></i>
                                                <span class="">Donload Trash Task</span>
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="todo-button">
                            @if (Auth::user()->can('all.task'))
                                <button type="button"
                                    class="{{ Request::routeIs('all.todo') ? 'active' : '' }} inbox-button"
                                    onclick="navigateTo('{{ route('all.todo') }}', 'all')">
                                    <i class="mdi mdi-format-list-bulleted-type"></i> Inbox
                                </button>
                            @endif

                            <button type="button" class="done-button" onclick="filterTasks('Done')"><i
                                    class="mdi mdi-check-circle"></i> Done</button>

                            <button type="button" class="important-button" onclick="filterTasks('important')"><i
                                    class="mdi mdi-star-circle"></i> Important</button>

                            @if (Auth::user()->can('trash.task'))
                                <button type="button" class="{{ Request::routeIs('trash.todo') ? 'active' : '' }}"
                                    onclick="navigateTo('{{ route('trash.todo') }}', 'trash')">
                                    <i class="mdi mdi-delete-forever"></i> Trash
                                </button>
                            @endif
                        </div>
                        <hr>
                        <div>
                            <h2>Process</h2>
                            <div class="tags-button">
                                <button type="button" class="low" onclick="filterTasks('low')"><i
                                        class="mdi mdi-near-me"></i> Low</button>
                                <button type="button" class="medium" onclick="filterTasks('medium')"><i
                                        class="mdi mdi-near-me"></i> Medium</button>
                                <button type="button" class="high" onclick="filterTasks('high')"><i
                                        class="mdi mdi-near-me"></i> High</button>
                            </div>
                        </div>
                        @if (Auth::user()->can('add.task'))
                            <a href="{{ route('add.todo') }}" onclick="navigateTo('{{ route('add.todo') }}')">
                                <input type="button" class="add-button" value="Create New Task">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-9 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">{{ Request::routeIs('all.todo') ? 'All Tasks' : 'Trash Tasks' }}
                                </h6>
                                <div class="table-responsive">
                                    <form id="saveForm" action="{{ route('save.changes') }}" method="POST">
                                        @csrf
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Task</th>
                                                    {{-- <th>Description</th> --}}
                                                    <th>Process</th>
                                                    <th>Imp</th>
                                                    <th>User</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($alltask))
                                                    @foreach ($alltask as $key => $task)
                                                        <tr class="task-row">
                                                            <td>
                                                                <input type="hidden" name="task_ids[{{ $task->id }}]"
                                                                    value="0">
                                                                <!-- Hidden input for unchecked checkbox -->
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="task_ids[{{ $task->id }}]" value="1"
                                                                    {{ $task->status === 'Done' ? 'checked' : '' }}>
                                                                <input type="hidden" name="status_{{ $task->id }}"
                                                                    value="{{ $task->status === 'Done' ? '1' : '0' }}">
                                                                <input type="hidden" name="task_id_{{ $task->id }}"
                                                                    value="{{ $task->id }}">
                                                            </td>


                                                            <td>
                                                                <p title="{{ $task->title }}"
                                                                    style="font-weight: 500; {{ $task->status == 'Done' ? 'text-decoration: line-through; text-decoration-color: rgb(12,77,162); text-decoration-thickness: 1.5px;' : '' }}">
                                                                    {{ \Illuminate\Support\Str::limit($task->title, 60) }}
                                                                </p>
                                                                <p title="{{ $task->description }}"
                                                                    style="{{ $task->status == 'Done' ? 'text-decoration: line-through; text-decoration-color: rgb(12,77,162); text-decoration-thickness: 1.5px;' : '' }}">
                                                                    {{ \Illuminate\Support\Str::limit($task->description, 60) }}
                                                                </p>
                                                            </td>


                                                            <td>
                                                                <select name="status_{{ $task->id }}" class="status1">
                                                                    <option value="low"
                                                                        {{ $task->process === 'low' ? 'selected' : '' }}>
                                                                        Low</option>
                                                                    <option value="medium"
                                                                        {{ $task->process === 'medium' ? 'selected' : '' }}>
                                                                        Medium</option>
                                                                    <option value="high"
                                                                        {{ $task->process === 'high' ? 'selected' : '' }}>
                                                                        High</option>
                                                                </select>
                                                                <input type="hidden"
                                                                    name="selected_status_{{ $task->id }}"
                                                                    value="{{ $task->process }}">
                                                            </td>


                                                            <td class="star1">
                                                                <input type="hidden"
                                                                    name="importance[{{ $task->id }}]"
                                                                    value="important">
                                                                <input class="star" type="checkbox"
                                                                    title="bookmark page"
                                                                    name="importance[{{ $task->id }}]" value="none"
                                                                    {{ $task->imp !== 'important' ? 'checked' : '' }}><br /><br />
                                                            </td>
                                                            <td>
                                                                {{ $task->user_task }}
                                                            </td>
                                                            <td>
                                                                <div class="dropdown mb-2" class="edit_todo">
                                                                    <a type="button" id="dropdownMenuButton"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false" class="">
                                                                        <i class="mdi mdi-dots-vertical"
                                                                            style="font-size: 20px"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton"
                                                                        style="">
                                                                        @if (Request::routeIs('all.todo'))
                                                                            @if (Auth::user()->can('view.task'))
                                                                                <button type="button"
                                                                                    style="color:rgb(197, 162, 6);"
                                                                                    class="dropdown-item d-flex align-items-center view-button"
                                                                                    data-task-id="{{ $task->id }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        style="color:rgb(197, 162, 6);"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-eye icon-sm me-2">
                                                                                        <path
                                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                        </path>
                                                                                        <circle cx="12"
                                                                                            cy="12" r="3"></circle>
                                                                                    </svg>
                                                                                    <span>View</span>
                                                                                </button>
                                                                            @endif
                                                                            @if (Auth::user()->can('edit.task'))
                                                                                <a class="dropdown-item d-flex align-items-center"
                                                                                    style="color: blue;"
                                                                                    href="{{ route('edit.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        style="color: blue;"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-edit-2 icon-sm me-2">
                                                                                        <path
                                                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <span class="">Edit</span>
                                                                                </a>
                                                                            @endif
                                                                            @if (Auth::user()->can('delete.task'))
                                                                                <a id="DeleteTask" style="color: red;"
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('delete.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        style="color: red;" width="24"
                                                                                        height="24" viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-trash icon-sm me-2">
                                                                                        <polyline points="3 6 5 6 21 6">
                                                                                        </polyline>
                                                                                        <path
                                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <span class="">Delete</span>
                                                                                </a>
                                                                            @endif
                                                                        @else
                                                                            @if (Auth::user()->can('recover.task'))
                                                                                <a id="RecoverTask"
                                                                                    style="color:rgb(12, 77, 162);"
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('recover.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        style="color:rgb(12, 77, 162);"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-rotate-cw icon-sm me-2">
                                                                                        <polyline
                                                                                            points="23 4 23 10 17 10">
                                                                                        </polyline>
                                                                                        <polyline points="1 20 1 14 7 14">
                                                                                        </polyline>
                                                                                        <path
                                                                                            d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l3.85 3.36A9 9 0 0 0 20.49 15">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <span class="">Recover</span>
                                                                                </a>
                                                                            @endif
                                                                            @if (Auth::user()->can('permanent.task'))
                                                                                <a id="DeletePermanent" style="color:red;"
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('permanent.delete.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        style="color:red;" width="24"
                                                                                        height="24" viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-trash icon-sm me-2">
                                                                                        <polyline points="3 6 5 6 21 6">
                                                                                        </polyline>
                                                                                        <path
                                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <span class="">Permanent
                                                                                        Delete</span>
                                                                                </a>
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <input type="submit"
                                            class="button-save {{ Request::routeIs('all.todo') ? '' : 'd-none' }}"
                                            value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Title: <span id="taskModalTitle"></span></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Description: <span id="taskModalDescription"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to show task details on view button click
            $('.view-button').click(function() {
                // Get the task details
                var row = $(this).closest('.task-row');
                var title = row.find('td:nth-child(2) p:first-child').attr('title');
                var description = row.find('td:nth-child(2) p:last-child').attr('title');
                var process = row.find('.status1').val();

                // Show the modal with task details
                $('#taskModalTitle').text(title);
                $('#taskModalDescription').text(description);
                $('#taskModalProcessValue').text(process); // Update the process value
                $('#taskModal').modal('show');
            });

        });
    </script>


@endsection
