@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <div class="page-content ">
        <div class="row">

            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('all.admin') }}"><i class="mdi mdi-arrow-left-bold-circle-outline"
                                style=" font-size: 25px;"></i></a>
                        <h6 style="margin-top: 0px;" class="card-title">User Detail</h6>

                        <form class="forms-sample" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter User Name" value="{{ $user->name }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nick Name</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="User Not completed" value="{{ $user->username }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="User Not completed" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="User Not completed" value="{{ $user->phone }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <label for="exampleInputRoleName" class="form-label">Role</label>
                            <div class="form-group mb-3">
                                <select name="roles" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Role</option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6" style="color: rgb(196,160,6)">
                                    <div class="mb-3">
                                        <label class="form-label">Created User By</label>
                                        <input type="text" name="name" class="form-control"
                                            style="color: rgb(196,160,6)" value="{{ $user->created_by }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6" style="color: rgb(12,77,162)">
                                    <div class="mb-3">
                                        <label class="form-label">Approved User By</label>
                                        <input type="text" name="username"
                                            class="form-control"style="color: rgb(12,77,162)"
                                            value="{{ $user->approved_by }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Created Date</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->created_date }}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Approved Date</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $user->approved_at }}">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
