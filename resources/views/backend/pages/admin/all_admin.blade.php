@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="http://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.man.css"> --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/bootstrap-toggle-master/css/bootstrap-toggle.min.css') }}">
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                @if (Auth::user()->can('add.admin'))
                    <a href="{{ route('add.admin') }}" class="btn btn-info">Add User</a>
                @endif
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
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

                                                @if (Auth::user()->can('edit.admin'))
                                                    <a href="{{ route('edit.admin', $item->id) }}" class="btn btn-warning"
                                                        title="edit">Edit</a>
                                                @endif
                                                {{-- @if (Auth::user()->can('edit.admin')) --}}
                                                <a href="{{ route('reset.admin', $item->id) }}" class="btn btn-info"
                                                    title="edit">Re-Pass</a>
                                                {{-- @endif --}}
                                                @if (Auth::user()->can('delete.admin'))
                                                    <a href="{{ route('delete.admin', $item->id) }}" class="btn btn-danger"
                                                        id="deleteuser" title="delete">Delete</a>
                                                @endif
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
