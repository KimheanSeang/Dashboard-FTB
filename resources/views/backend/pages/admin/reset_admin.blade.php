@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($profileData1->photo) ? url('upload/admin_images/' . $profileData1->photo) : url('upload/no.jpg') }}"
                                    alt="profile">


                                <span class="h4 ms-3 ">{{ $profileData1->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name:</label>
                            <p class="text-muted">{{ $profileData1->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData1->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData1->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData1->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Reset Password</h6>
                                <form class="forms-sample" method="POST"
                                    action="{{ route('reset.admin.update', $profileData1->id) }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="password" name="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            id="new_password" autocomplete="off" placeholder="New Password">
                                        @error('new_password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="new_password_confirmation" class="form-control"
                                            id="new_password_confirmation" autocomplete="off"
                                            placeholder="Confirm New Password">
                                    </div>

                                    <button type="submit" class="btn btn-warning me-2">Reset
                                        Password</button>
                                    <a href="{{ route('all.admin') }}" class="btn btn-info me-2">Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
@endsection
