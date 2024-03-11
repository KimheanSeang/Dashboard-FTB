@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Edit User Admin</h6>
                                <form class="forms-sample" method="POST" action="{{ route('update.admin', $user->id) }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <label for="exampleInputUserName" class="form-label">User Name</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $user->username }}">
                                    </div>


                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>

                                    <label for="exampleInputEmail" class="form-label">Email</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>

                                    <label for="exampleInputPhone" class="form-label">Phone Number</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>

                                    <label for="exampleInputAddress" class="form-label">Address</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $user->address }}">
                                    </div>

                                    <label for="exampleInputRoleName" class="form-label">Role Name</label>
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


                                    <button type="submit" class="btn btn-primary me-2">Update</button>
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
