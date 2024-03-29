@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content" style="margin-bottom: 170px">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="circle100-image" {{-- class="wd-100 rounded-circle" --}}
                                    src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    alt="profile">

                                <span class="h4 ms-3 ">{{ $profileData->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone Number:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
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
                                <h6 class="card-title">Change Password</h6>
                                <form class="forms-sample" method="POST" action="{{ route('admin.update.password') }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3">
                                        <input type="password" name="old_password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            id="old_password" autocomplete="off" placeholder="Enter Old Password">
                                        @error('old_password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

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


                                    <button type="submit" class="btn btn-warning me-2">Save Changes</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>
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
