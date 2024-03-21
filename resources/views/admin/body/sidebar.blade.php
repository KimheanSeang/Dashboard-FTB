<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/admin/dashboard') }}">
            <img src="/images/logo.jpg" alt="Logo" class="ftb-logo">
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
            @if (Auth::user()->can('chatbot'))
                <li class="nav-item nav-category">Pages</li>
                <li class="nav-item">
                    <a href="{{ route('all.chatbot') }}" class="nav-link ">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">ChatBot</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('knowledge.menu'))

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false"
                        aria-controls="charts">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Chat_Knowledge</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('add.knowledge'))
                                <li class="nav-item">
                                    <a href="{{ route('add.chatbot') }}" class="nav-link">Add Knowledge</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('knowledge.chatbot'))
                                <li class="nav-item">
                                    <a href="{{ route('knowledge.chatbot') }}" class="nav-link">All Knowledge</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('check.knowledge'))
                                <li class="nav-item">
                                    <a href="{{ route('check.knowledge') }}" class="nav-link">Check Knowledge</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::user()->can('doc.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button"
                        aria-expanded="false" aria-controls="advancedUI">
                        <i class="link-icon" data-feather="upload"></i>
                        <span class="link-title">Document</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="advancedUI">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('add.doc'))
                                <li class="nav-item">
                                    <a href="{{ route('add.doc') }}" class="nav-link">Upload Docs</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('all.doc'))
                                <li class="nav-item">
                                    <a href="{{ route('all.doc') }}" class="nav-link">All Document</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('approve.doc'))
                                <li class="nav-item">
                                    <a href="{{ route('approve.doc') }}" class="nav-link">Check Documents</a>
                                </li>
                            @endif

                            @if (Auth::user()->can('all.report'))
                                <li class="nav-item">
                                    <a href="{{ route('all.report') }}" class="nav-link">Report</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif


            @if (Auth::user()->can('task.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false"
                        aria-controls="tables">
                        <i class="link-icon" data-feather="check-circle"></i>
                        <span class="link-title">To-do List</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('user.todo') }}" class="nav-link">User Task</a>
                            </li>
                            @if (Auth::user()->can('all.task'))
                                <li class="nav-item">
                                    <a href="{{ route('all.todo') }}" class="nav-link">Task Mgt</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('add.task'))
                                <li class="nav-item">
                                    <a href="{{ route('add.todo') }}" class="nav-link">Create Task</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('trash.task'))
                                <li class="nav-item">
                                    <a href="{{ route('trash.todo') }}" class="nav-link">Trash Task</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('check.task'))
                                <li class="nav-item">
                                    <a href="{{ route('check.todo') }}" class="nav-link">Check Task</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::user()->can('all.read'))
                <li class="nav-item">
                    <a href="{{ route('all.read') }}" class="nav-link ">
                        <i class="link-icon" data-feather="file"></i>
                        <span class="link-title">Read Error In log</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('permission.menu'))
                <li class="nav-item nav-category">User Management</li>
            @endif
            @if (Auth::user()->can('permission.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                        aria-expanded="false" aria-controls="general-pages">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">Roles & Permissions</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('all.permission'))
                                <li class="nav-item">
                                    <a href="{{ route('all.permission') }}" class="nav-link ">Permissions Mgt</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('all.role'))
                                <li class="nav-item">
                                    <a href="{{ route('all.roles') }}" class="nav-link">Roles Mgt</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('add.roles.permission'))
                                <li class="nav-item">
                                    <a href="{{ route('add.roles.permission') }}" class="nav-link">Add Permission
                                        to
                                        Role</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('all.roles.permission'))
                                <li class="nav-item">
                                    <a href="{{ route('all.roles.permission') }}" class="nav-link">All Role &
                                        Permission</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::user()->can('admin.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button"aria-expanded="false"
                        aria-controls="admin">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">User Management</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('all.admin'))
                                <li class="nav-item">
                                    <a href="{{ route('all.admin') }}" class="nav-link">All User</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('add.admin'))
                                <li class="nav-item">
                                    <a href="{{ route('add.admin') }}" class="nav-link">Create User</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('user.check'))
                                <li class="nav-item">
                                    <a href="{{ route('check.user') }}" class="nav-link">Check User</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
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
