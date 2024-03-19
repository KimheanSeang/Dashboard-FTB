@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Create New User</h6>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">User Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter User Name" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nick Name</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Nick Name is can be Null">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="City Can Be Null">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Phone Number Can be Null">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" autocomplete="off"
                                            placeholder="Password" required>
                                    </div>
                                </div>
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
                            <button type="submit" class="btn btn-warning me-2">Submit</button>
                            <a href="{{ route('all.admin') }}" class="btn btn-info me-2">Cancel</a>
                        </form>
                        <p style="color: red;" class="mt-3">Not*: User roles can be assigned here, but if you haven't done
                            so, you can assign them in the "Edit" function for all users. Simply navigate to the edit option
                            to set the role for each user accordingly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
