@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content" style="margin-bottom: 10px">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-80 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
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
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
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
                                <h6 class="card-title">Update Admin Profile</h6>
                                <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control"
                                            id="exampleInputUsername1" autocomplete="off" placeholder="enter username"
                                            value="{{ $profileData->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="enter name" value="{{ $profileData->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="enter email" value="{{ $profileData->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="phone" class="form-control" id="exampleInputUsername1"
                                            placeholder="enter phone number" autocomplete="off"
                                            value="{{ $profileData->phone }}">

                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="address" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" placeholder="input addresss"
                                            value="{{ $profileData->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="formFile">Profile</label>
                                        <input class="form-control" name="photo" type="file" id="Images">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="formFile"></label>
                                        <img id="ShowImages" class="wd-80 rounded-circle"
                                            src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no.jpg') }}"
                                            alt="profile">
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#Images').on('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#ShowImages').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
