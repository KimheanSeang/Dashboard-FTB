{{-- @extends('admin.todo.todo')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper todo-1">
                <div class="card rounded">
                    <div class="card-body">
                        <h1 class="todo-h1">Todo list</h1>
                        <hr>
                        <div class="todo-button">
                            <button type="button" class="{{ Request::routeIs('all.todo') ? 'active' : '' }}"
                                onclick="navigateTo('{{ route('all.todo') }}')">
                                <i class="mdi mdi-format-list-bulleted-type"></i> Inbox
                            </button>

                            <button type="submit"><i class="mdi mdi-check-circle"></i> Done</button>
                            <button type="submit"><i class="mdi mdi-star-outline"></i> Important</button>

                            <button type="button" class="{{ Request::routeIs('trash.todo') ? 'active' : '' }}"
                                onclick="navigateTo('{{ route('trash.todo') }}')">
                                <i class="mdi mdi-delete-forever"></i> Trash
                            </button>
                        </div>
                        <hr>
                        <div>
                            <h2>Tage</h2>
                            <div class="tags-button">
                                <button type="submit" class="low"><i class="mdi mdi-near-me"></i> Low</button>
                                <button type="submit" class="medium"><i class="mdi mdi-near-me"></i> Medium</button>
                                <button type="submit" class="high"><i class="mdi mdi-near-me"></i> High</button>
                            </div>
                        </div>

                        <a href="{{ route('add.todo') }}" onclick="navigateTo('{{ route('add.todo') }}')">
                            <input type="button" class="add-button" value="+ Add New Task">
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-9 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">{{ Request::routeIs('all.todo') ? 'All Tasks' : 'Trash Tasks' }}</h6>
                                <div class="table-responsive">
                                    <form id="saveForm" action="{{ route('save.changes') }}" method="POST">
                                        @csrf
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Task Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Im</th>
                                                    <th>User</th>
                                                    <th>Op</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($alltask))
                                                    @foreach ($alltask as $key => $task)
                                                        <tr>
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

                                                            <td title="{{ $task->title }}">
                                                                {{ \Illuminate\Support\Str::limit($task->title, 15) }}</td>
                                                            <td title="{{ $task->description }}">
                                                                {{ \Illuminate\Support\Str::limit($task->description, 15) }}
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
                                                                <!-- Hidden input for unchecked checkbox -->
                                                                <input type="hidden"
                                                                    name="importance[{{ $task->id }}]"
                                                                    value="important">
                                                                <input class="star" type="checkbox" title="bookmark page"
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
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                                                            <circle cx="12" cy="12" r="1">
                                                                            </circle>
                                                                            <circle cx="19" cy="12" r="1">
                                                                            </circle>
                                                                            <circle cx="5" cy="12" r="1">
                                                                            </circle>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton"
                                                                        style="">
                                                                        @if (Request::routeIs('all.todo'))
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('view.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-eye icon-sm me-2">
                                                                                    <path
                                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                    </path>
                                                                                    <circle cx="12" cy="12"
                                                                                        r="3">
                                                                                    </circle>
                                                                                </svg>

                                                                                <span class="">View</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('edit.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-edit-2 icon-sm me-2">
                                                                                    <path
                                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="">Edit</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('delete.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
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
                                                                        @else
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('recover.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-rotate-cw icon-sm me-2">
                                                                                    <polyline points="23 4 23 10 17 10">
                                                                                    </polyline>
                                                                                    <polyline points="1 20 1 14 7 14">
                                                                                    </polyline>
                                                                                    <path
                                                                                        d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l3.85 3.36A9 9 0 0 0 20.49 15">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="">Recover</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('permanent.delete.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
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
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <input type="submit" class="button-save" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}



@extends('admin.todo.todo')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper todo-1">
                <div class="card rounded">
                    <div class="card-body">
                        <h1 class="todo-h1">Todo list</h1>
                        <hr>
                        <div class="todo-button">
                            <button type="button" class="{{ Request::routeIs('all.todo') ? 'active' : '' }} inbox-button"
                                onclick="navigateTo('{{ route('all.todo') }}', 'all')">
                                <i class="mdi mdi-format-list-bulleted-type"></i> Inbox
                            </button>
                            <button type="button" class="done-button" onclick="filterTasks('Done')"><i
                                    class="mdi mdi-check-circle"></i> Done</button>
                            <button type="button" class="important-button" onclick="filterTasks('important')"><i
                                    class="mdi mdi-star-outline"></i> Important</button>

                            <button type="button" class="{{ Request::routeIs('trash.todo') ? 'active' : '' }}"
                                onclick="navigateTo('{{ route('trash.todo') }}', 'trash')">
                                <i class="mdi mdi-delete-forever"></i> Trash
                            </button>
                        </div>
                        <hr>
                        <div>
                            <h2>Tage</h2>
                            <div class="tags-button">
                                <button type="button" class="low" onclick="filterTasks('low')"><i
                                        class="mdi mdi-near-me"></i> Low</button>
                                <button type="button" class="medium" onclick="filterTasks('medium')"><i
                                        class="mdi mdi-near-me"></i> Medium</button>
                                <button type="button" class="high" onclick="filterTasks('high')"><i
                                        class="mdi mdi-near-me"></i> High</button>
                            </div>
                        </div>


                        <a href="{{ route('add.todo') }}" onclick="navigateTo('{{ route('add.todo') }}')">
                            <input type="button" class="add-button" value="+ Add New Task">
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xl-9 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">{{ Request::routeIs('all.todo') ? 'All Tasks' : 'Trash Tasks' }}</h6>
                                <div class="table-responsive">
                                    <form id="saveForm" action="{{ route('save.changes') }}" method="POST">
                                        @csrf
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Task Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Im</th>
                                                    <th>User</th>
                                                    <th>Op</th>
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

                                                            <td title="{{ $task->title }}">
                                                                {{ \Illuminate\Support\Str::limit($task->title, 15) }}</td>
                                                            <td title="{{ $task->description }}">
                                                                {{ \Illuminate\Support\Str::limit($task->description, 15) }}
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
                                                                <!-- Hidden input for unchecked checkbox -->
                                                                <input type="hidden"
                                                                    name="importance[{{ $task->id }}]"
                                                                    value="important">
                                                                <input class="star" type="checkbox" title="bookmark page"
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
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-more-horizontal icon-lg text-muted pb-3px">
                                                                            <circle cx="12" cy="12" r="1">
                                                                            </circle>
                                                                            <circle cx="19" cy="12" r="1">
                                                                            </circle>
                                                                            <circle cx="5" cy="12" r="1">
                                                                            </circle>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton"
                                                                        style="">
                                                                        @if (Request::routeIs('all.todo'))
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('view.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-eye icon-sm me-2">
                                                                                    <path
                                                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                    </path>
                                                                                    <circle cx="12" cy="12"
                                                                                        r="3"></circle>
                                                                                </svg>

                                                                                <span class="">View</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('edit.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-edit-2 icon-sm me-2">
                                                                                    <path
                                                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="">Edit</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('delete.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
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
                                                                        @else
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('recover.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-rotate-cw icon-sm me-2">
                                                                                    <polyline points="23 4 23 10 17 10">
                                                                                    </polyline>
                                                                                    <polyline points="1 20 1 14 7 14">
                                                                                    </polyline>
                                                                                    <path
                                                                                        d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l3.85 3.36A9 9 0 0 0 20.49 15">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="">Recover</span>
                                                                            </a>
                                                                            <a class="dropdown-item d-flex align-items-center"
                                                                                href="{{ route('permanent.delete.todo', ['id' => $task->id]) }}">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
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
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <input type="submit" class="button-save" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


@endsection
