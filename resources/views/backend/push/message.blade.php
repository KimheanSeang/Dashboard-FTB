@extends('admin.admin_dashboard')
@section('admin')
    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
        $allUsers = App\Models\User::where('id', '!=', $id)->get();
    @endphp

    <div class="page-content">
        <div class="row chat-wrapper">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row position-relative">
                            <div class="col-lg-4 chat-aside border-end-lg">
                                <div class="aside-content">
                                    <div class="aside-header">
                                        <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                                            <div class="d-flex align-items-center">
                                                <figure class="me-2 mb-0">
                                                    <img class="circle45-image"
                                                        src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
                                                        alt="profile">
                                                    <div class="status online"></div>
                                                </figure>
                                                <div>
                                                    <h6>{{ $profileData->name }}</h6>
                                                    <p class="text-muted tx-13">{{ $profileData->email }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <form class="search-form">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-search cursor-pointer">
                                                        <circle cx="11" cy="11" r="8"></circle>
                                                        <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                        </line>
                                                    </svg>
                                                </span>
                                                <input type="text" class="form-control" id="searchForm"
                                                    placeholder="Search here...">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="aside-body">
                                        <ul class="nav nav-tabs nav-fill mt-3" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="chats-tab" data-bs-toggle="tab"
                                                    data-bs-target="#chats" role="tab" aria-controls="chats"
                                                    aria-selected="true">
                                                    <div
                                                        class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-message-square icon-sm me-sm-2 me-lg-0 me-xl-2 mb-md-1 mb-xl-0">
                                                            <path
                                                                d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                            </path>
                                                        </svg>
                                                        <p class="d-none d-sm-block">Chats</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-3">
                                            <div class="tab-pane fade show active ps ps--active-y" id="chats"
                                                role="tabpanel" aria-labelledby="chats-tab">
                                                <div>
                                                    <p class="text-muted mb-1">All Contact</p>
                                                    <ul class="list-unstyled chat-list px-1">
                                                        @foreach ($allUsers as $user)
                                                            <li class="chat-item pe-1">
                                                                <a href="javascript:;" class="d-flex align-items-center">
                                                                    <figure class="mb-0 me-2">
                                                                        <img src="{{ !empty($user->photo) ? url('upload/admin_images/' . $user->photo) : 'https://via.placeholder.com/37x37' }}"
                                                                            class="img-xs rounded-circle" alt="user">
                                                                        <div
                                                                            class="status {{ $user->online ? 'online' : 'offline' }}">
                                                                        </div>
                                                                    </figure>
                                                                    <div
                                                                        class="d-flex justify-content-between flex-grow-1 border-bottom">
                                                                        <div>
                                                                            <p class="text-body fw-bolder">
                                                                                {{ $user->name }}</p>
                                                                            <p class="text-muted tx-13">Hi, How are
                                                                                you?</p>
                                                                        </div>
                                                                        <div class="d-flex flex-column align-items-end">
                                                                            <p class="text-muted tx-13 mb-1">4:32 PM
                                                                            </p>
                                                                            <div
                                                                                class="badge rounded-pill bg-primary ms-auto">
                                                                                5</div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                    </div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; height: 337px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0"
                                                        style="top: 0px; height: 165px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 chat-content">
                                <div class="chat-header border-bottom pb-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-corner-up-left icon-lg me-2 ms-n2 text-muted d-lg-none"
                                                id="backToChatList">
                                                <polyline points="9 14 4 9 9 4"></polyline>
                                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                            </svg>
                                            <figure class="mb-0 me-2">
                                                <img src="https://via.placeholder.com/43x43" class="img-sm rounded-circle"
                                                    alt="image">
                                                <div class="status online"></div>
                                                <div class="status online"></div>
                                            </figure>
                                            <div>
                                                <p>Mariana Zenha</p>
                                                <p class="text-muted tx-13">Front-end Developer</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="chat-body ps ps--active-y">
                                    <ul class="messages">
                                        <li class="message-item friend">
                                            <img src="https://via.placeholder.com/36x36" class="img-xs rounded-circle"
                                                alt="avatar">
                                            <div class="content">
                                                <div class="message">
                                                    <div class="bubble">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry.</p>
                                                    </div>
                                                    <span>8:12 PM</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="message-item me">
                                            <img class="circle36-image"
                                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
                                                alt="profile">
                                            <div class="content">
                                                <div class="message">
                                                    <div class="bubble">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting industry printing and typesetting
                                                            industry.</p>
                                                    </div>
                                                </div>
                                                <div class="message">
                                                    <div class="bubble">
                                                        <p>Lorem Ipsum.</p>
                                                    </div>
                                                    <span>8:13 PM</span>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 382px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 184px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-footer d-flex">
                                    <div>
                                        <button type="button" class="btn border btn-icon rounded-circle me-2"
                                            data-bs-toggle="tooltip" data-bs-title="Emoji">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-smile text-muted">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                <line x1="9" y1="9" x2="9.01" y2="9">
                                                </line>
                                                <line x1="15" y1="9" x2="15.01" y2="9">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <button type="button" class="btn border btn-icon rounded-circle me-2"
                                            data-bs-toggle="tooltip" data-bs-title="Attatch files">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-paperclip text-muted">
                                                <path
                                                    d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <button type="button" class="btn border btn-icon rounded-circle me-2"
                                            data-bs-toggle="tooltip" data-bs-title="Record you voice">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-mic text-muted">
                                                <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                                                <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                                                <line x1="12" y1="19" x2="12" y2="23">
                                                </line>
                                                <line x1="8" y1="23" x2="16" y2="23">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    <form class="search-form flex-grow-1 me-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill" id="chatForm"
                                                placeholder="Type a message">
                                        </div>
                                    </form>
                                    <div>
                                        <button type="button" class="btn btn-primary btn-icon rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13">
                                                </line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
