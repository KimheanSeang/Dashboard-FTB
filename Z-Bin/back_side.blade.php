<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-brand">
            FTB<span> Bank</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>

        </div>
    </div>
    <div class="sidebar-body ">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item ">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link ">
                    <i class="mdi mdi-view-dashboard" style="font-size: 20px"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">RealEstate</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>

                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('all.chat') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">ChatBot</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.chatbot') }}" class="nav-link">ChatBot</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.chatbot') }}" class="nav-link">Add Knowledge</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('knowledge.chatbot') }}" class="nav-link">All Knowledge</a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                    aria-controls="advancedUI">
                    <i class="link-icon" data-feather="upload"></i>
                    <span class="link-title">Document</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.doc') }}" class="nav-link">Upload</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.doc') }}" class="nav-link">All Document</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.report') }}" class="nav-link">Report</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false"
                    aria-controls="forms">
                    <i class="link-icon" data-feather="file"></i>
                    <span class="link-title">Read Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.read') }}" class="nav-link">Read Error in Log</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false"
                    aria-controls="charts">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Assessment User</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('add.assessment') }}" class="nav-link">New User Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('move.assessment') }}" class="nav-link">Move User
                                Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.assessment') }}" class="nav-link">Assessment User
                                List</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">User Management</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                    aria-expanded="false" aria-controls="general-pages">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Roles & Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.permission') }}" class="nav-link ">Permissions Mgt</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles') }}" class="nav-link">Roles Mgt</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.roles.permission') }}" class="nav-link">Add Permission to
                                Role</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles.permission') }}" class="nav-link">All Role &
                                Permission</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false"
                    aria-controls="admin">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">User Management</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="admin">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.admin') }}" class="nav-link">All User</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.admin') }}" class="nav-link">Add User</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="{{ route('document.document') }}" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>

    </div>
</nav>






















@extends('admin.todo.todo')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper todo-1">
                <div class="card rounded">
                    <div class="card-body">
                        <div style="display: flex">
                            <h1 class="todo-h1">Todo list</h1>
                            <div class="dropdown mb-2" style="margin-left: 17vh">
                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" class="">
                                    <i data-feather="download"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('export.all.task') }}">
                                        <i class="mdi mdi-download" style="font-size: 2.4vh; margin-right: 5px"></i>
                                        <span class="">Download All Task</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('export.trash.task') }}">
                                        <i class="mdi mdi-export" style="font-size: 2.4vh; margin-right: 5px"></i>
                                        <span class="">Donload Trash Task</span>
                                    </a>

                                </div>
                            </div>
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
                                <input type="button" class="add-button" value="+ Add New Task">
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
                                                                <input type="hidden"
                                                                    name="task_ids[{{ $task->id }}]" value="0">
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
                                                                <p title="{{ $task->title }}" style="font-weight: 900">
                                                                    {{ \Illuminate\Support\Str::limit($task->title, 40) }}
                                                                </p>
                                                                <p title="{{ $task->description }}">
                                                                    {{ \Illuminate\Support\Str::limit($task->description, 40) }}
                                                                </p>
                                                            </td>


                                                            <td>
                                                                <select name="status_{{ $task->id }}"
                                                                    class="status1">
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
                                                                            {{-- @if (Auth::user()->can('view.task'))
                                                                                <a class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('view.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
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
                                                                                            cy="12" r="3">
                                                                                        </circle>
                                                                                    </svg>

                                                                                    <span class="">View</span>
                                                                                </a>
                                                                            @endif --}}
                                                                            @if (Auth::user()->can('view.task'))
                                                                                <button type="button"
                                                                                    class="dropdown-item d-flex align-items-center view-button"
                                                                                    data-task-id="{{ $task->id }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
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
                                                                                    href="{{ route('edit.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
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
                                                                                <a id="DeleteTask"
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('delete.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
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
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('recover.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
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
                                                                                <a id="DeletePermanent"
                                                                                    class="dropdown-item d-flex align-items-center"
                                                                                    href="{{ route('permanent.delete.todo', ['id' => $task->id]) }}">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
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
                                        <button type="button" class="btn btn-link view-button"
                                            data-task-id="{{ $task->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye icon-sm me-2">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                            <span>View</span>
                                        </button>

                                        {{-- <input type="submit" class="button-save" value="Save"> --}}
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
                    <h5 class="modal-title" id="taskModalLabel">Task Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Title: <span id="taskModalTitle"></span></h5>
                    <p>Description: <span id="taskModalDescription"></span></p>
                    <p>Process: <span id="taskModalProcess"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
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
    </script> --}}
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

        $(document).ready(function() {
            // Function to show task details on view button click
            $('.view-button').click(function() {
                // Get the task details
                var title = $(this).closest('.task-row').find('.title').text().trim();
                var description = $(this).closest('.task-row').find('.description').text().trim();
                var process = $(this).closest('.task-row').find('.status1').val();

                // Show the modal with task details
                $('#taskModalTitle').text(title);
                $('#taskModalDescription').text(description);
                $('#taskModalProcess').text(process);
                $('#taskModal').modal('show');
            });
        });
    </script>

@endsection
