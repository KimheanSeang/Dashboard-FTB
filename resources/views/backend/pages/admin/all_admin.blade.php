@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="http://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.man.css"> --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css') }}">
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if (Auth::user()->can('add.admin'))
                    <a href="{{ route('add.admin') }}" class="btn btn-info"><i class="mdi mdi-plus-circle-outline"
                            style="margin-right: 10px"></i>Create
                        New User</a>
                @endif
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('export.user') }}" class="btn btn-warning"><i class="mdi mdi-download"
                        style="margin-right: 10px"></i>Export All User</a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">User Management</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alladmin as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img
                                                    src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : url('upload/no.jpg') }}">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                @foreach ($item->roles as $role)
                                                    <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>

                                                <div class="dropdown mb-2" class="edit_todo">
                                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" class="">
                                                        <i class="mdi mdi-dots-vertical" style="font-size: 20px"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                        style="">
                                                        @if (Auth::user()->can('detail_user'))
                                                            <a style="color: rgb(192,162,16);"
                                                                class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('detail.admin', $item->id) }}"
                                                                title="edit">
                                                                <i class="mdi mdi-eye"
                                                                    style="font-size: 2.2vh; margin-right: 5px; color: rgb(192,162,16);"></i>
                                                                <span class="">User Detail</span>
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->can('edit.admin'))
                                                            <a style="color: rgb(12,77,162);"
                                                                class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('edit.admin', $item->id) }}" title="edit">
                                                                <i class="mdi mdi-pencil"
                                                                    style="font-size: 2.2vh; margin-right: 5px; color: rgb(12,77,162);"></i>
                                                                <span class="">Edit User</span>
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->can('reset.password'))
                                                            <a style="color: rgb(0, 183, 255);"
                                                                class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('reset.admin', $item->id) }}"
                                                                title="edit">
                                                                <i class="mdi mdi-eyedropper"
                                                                    style="font-size: 2.2vh; margin-right: 5px; color: rgb(0, 183, 255);"></i>
                                                                <span class="">Reset Password</span>
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->can('delete.admin'))
                                                            <a id="deleteuser" style="color: red;"
                                                                class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('delete.admin', $item->id) }}"
                                                                title="delete">
                                                                <i class="mdi mdi-delete-forever"
                                                                    style="font-size: 2.2vh; margin-right: 5px; color: red;"></i>
                                                                <span class="">Delete</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
