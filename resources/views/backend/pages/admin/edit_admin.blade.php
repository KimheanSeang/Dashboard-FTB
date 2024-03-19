@extends('admin.admin_dashboard')
@section('admin')
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Create New User</h6>
                        <form class="forms-sample" method="POST" action="{{ route('update.admin', $user->id) }}"
                            enctype="multipart/form-data">
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
                                            placeholder="Nick Name is can be Null" value="{{ $user->username }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="City Can Be Null" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Phone Number Can be Null" value="{{ $user->phone }}">
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
                            <button type="submit" class="btn btn-warning me-2">Update</button>
                            <a href="{{ route('all.admin') }}"><button class="btn btn-info me-2">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
