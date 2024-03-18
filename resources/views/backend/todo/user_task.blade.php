@extends('admin.todo.todo')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">User Task</h6>
                                <div class="table-responsive">
                                    <form id="saveForm" action="{{ route('user.changes') }}" method="POST">
                                        @csrf
                                        <table id="dataTableExample" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Task</th>
                                                    <th>Process</th>
                                                    <th>Imp</th>
                                                    <th>User</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($usertasks))
                                                    @foreach ($usertasks as $key => $task)
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
                                                                    {{ \Illuminate\Support\Str::limit($task->title, 80) }}
                                                                </p>
                                                                <p title="{{ $task->description }}"
                                                                    style="{{ $task->status == 'Done' ? 'text-decoration: line-through; text-decoration-color: rgb(12,77,162); text-decoration-thickness: 1.5px;' : '' }}">
                                                                    {{ \Illuminate\Support\Str::limit($task->description, 90) }}
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <select name="status_{{ $task->id }}" class="status1">
                                                                    <option value="low"
                                                                        {{ $task->process === 'low' ? 'selected' : '' }}>
                                                                        Low
                                                                    </option>
                                                                    <option value="medium"
                                                                        {{ $task->process === 'medium' ? 'selected' : '' }}>
                                                                        Medium </option>
                                                                    <option value="high"
                                                                        {{ $task->process === 'high' ? 'selected' : '' }}>
                                                                        High
                                                                    </option>
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
                                                                        <i class="mdi mdi-dots-vertical"
                                                                            style="font-size: 20px"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton" style="">
                                                                        <button type="button" style="color: blue;"
                                                                            class="dropdown-item d-flex align-items-center view-button"
                                                                            data-task-id="{{ $task->id }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                style="color: blue;" width="24"
                                                                                height="24" viewBox="0 0 24 24"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-eye icon-sm me-2">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                                </path>
                                                                                <circle cx="12" cy="12" r="3">
                                                                                </circle>
                                                                            </svg>
                                                                            <span>View</span>
                                                                        </button>
                                                                        <a id="DeleteTask" style="color: red;"
                                                                            class="dropdown-item d-flex align-items-center"
                                                                            href="{{ route('remove.todo', ['id' => $task->id]) }}">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                style="color: red;" width="24"
                                                                                height="24" viewBox="0 0 24 24"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" stroke-linecap="round"
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
    <!-- Add this HTML for the modal -->
    <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <p
                        style="margin-left: 20vh;width: 15vh; background-color: rgb(197, 162, 6); text-align: center; color: white; border-radius: 20px;">
                        <span id="taskModalProcess" style=""></span>
                    </p> --}}
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
            $('.view-button').click(function() {
                // Get the task details
                var row = $(this).closest('.task-row');
                var title = row.find('td:nth-child(2) p:first-child').attr('title');
                var description = row.find('td:nth-child(2) p:last-child').attr('title');
                var process = row.find('.status1').val();

                // Show the modal with task details
                $('#taskModalTitle').text(title);
                $('#taskModalDescription').text(description);
                $('#taskModalProcess').text(process);
                $('#taskModal').modal('show');
            });
        });
    </script>
@endsection
