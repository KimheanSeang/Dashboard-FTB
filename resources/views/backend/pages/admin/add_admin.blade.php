@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Create User</h6>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" method="POST" action="{{ route('store.admin') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                            required>
                                    </div>
                                    <label for="exampleInputUserName" class="form-label">User Name</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="can be null">
                                    </div>

                                    <label for="exampleInputEmail" class="form-label">Email</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email"
                                            required>
                                    </div>
                                    <label for="exampleInputPhone" class="form-label">Phone Number</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="phone" class="form-control" placeholder="can be null">
                                    </div>
                                    <label for="exampleInputAddress" class="form-label">Address</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="address" class="form-control" placeholder="can be null">
                                    </div>
                                    <label for="exampleInputPassword" class="form-label">Password</label>
                                    <div class="form-group mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter Password" required>
                                    </div>
                                    <label for="exampleInputRoleName" class="form-label">Role Name</label>
                                    <div class="form-group mb-3">
                                        <select name="roles" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
