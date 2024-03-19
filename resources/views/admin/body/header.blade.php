@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

    if ($user) {
        $tasks = App\Models\Task::where('user_task', $user->name)->get();
    } else {
        $tasks = [];
    }
@endphp




<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                        class="ms-1 me-1 d-none d-md-inline-block">English</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us"
                            id="us"></i> <span class="ms-1"> English </span></a>
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-kh" title="fr"
                            id="fr"></i> <span class="ms-1"> Khmer </span></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x=" 3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Pags</p>
                    </div>
                    <div class="row g-0 p-1">
                        <div class="col-3 text-center">

                            <a href="{{ route('all.chatbot') }}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="message-square"></i>
                                <p class="tx-12">ChatBot</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{ route('all.doc') }}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="file"></i>
                                <p class="tx-12">All Docs</p>
                            </a>
                        </div>

                        <div class="col-3 text-center">
                            <a href="{{ route('add.doc') }}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="file-plus"></i>
                                <p class="tx-12">Add Docs</p>
                            </a>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{ route('all.read') }}"
                                class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="file-text"></i>
                                <p class="tx-12">Read Error</p>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <div class="indicator">
                        <div class="circle">
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu p-0 " aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>Notifications</p>
                        <h5 id="notificationCount"
                            style="color: white; background-color: red; height: 20px; width: 18px; border-radius: 50%; text-align: center;">
                            {{ $tasks->count() }}</h5>
                    </div>
                    <div class="p-1">
                        @foreach ($tasks as $task)
                            <a href="{{ route('user.todo') }}" class="dropdown-item d-flex align-items-center py-2">
                                <div
                                    class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                    <i class="icon-sm text-white" data-feather="alert-circle"></i>
                                </div>
                                <div class="flex-grow-1 me-2">
                                    <p>{{ $task->title }}</p>
                                    <p class="tx-12 text-muted">{{ $task->created_at->diffForHumans() }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="{{ route('user.todo') }}">View all</a>
                    </div>
                </div>
            </li>
            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img class="circle30-image" {{-- class="wd-30 rounded-circle" --}}
                        src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="circle80-image" {{-- class="wd-80 rounded-circle" --}}
                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
                                alt="profile">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ $profileData->name }}</p>
                            <p class="tx-12 text-muted">{{ $profileData->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.change.password') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.logout') }}" class="text-body ms-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-repeat me-2 icon-md">
                                    <polyline points="17 1 21 5 17 9"></polyline>
                                    <path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                                    <polyline points="7 23 3 19 7 15"></polyline>
                                    <path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                                </svg>
                                <span>Switch User</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="{{ route('admin.logout') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>
</nav>
<script>
    // Update notification count dynamically
    document.addEventListener('DOMContentLoaded', function() {
        // Get the notification count element
        const notificationCountElement = document.getElementById('notificationCount');
        // Update the count based on the actual number of tasks
        notificationCountElement.textContent = "{{ $tasks->count() }}";
    });
</script>
