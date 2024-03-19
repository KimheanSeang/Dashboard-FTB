@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb" style="display: flex">
            <ol class="breadcrumb">
                @if (Auth::user()->can('add.roles'))
                    <a href="{{ route('add.roles') }}" class="btn btn-info"><i class="mdi mdi-plus-circle-outline"
                            style="margin-right: 10px"></i>Create New Role</a>
                @endif
            </ol>

        </nav>
        <div class="row" style="margin-top: -10px">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Role and Permission in Role</h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Roles Name</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @foreach ($item->permissions as $prem)
                                                    <span class="badge bg-danger">{{ $prem->name }}</span>
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
                                                        @if (Auth::user()->can('edit.admin'))
                                                            <a class="dropdown-item d-flex align-items-center"
                                                                style="color: blue; "
                                                                href="{{ route('admin.edit.roles', $item->id) }}">
                                                                <i class="mdi mdi-table-edit"
                                                                    style="margin-right: 10px; font-size: 2vh;color: blue;"></i>
                                                                <span class="">Edit</span>
                                                            </a>
                                                        @endif
                                                        @if (Auth::user()->can('delete.admin'))
                                                            <a id="deleterolepermission" style="color: red"
                                                                class="dropdown-item d-flex align-items-center"
                                                                href="{{ route('admin.delete.roles', $item->id) }}">
                                                                <i class="mdi mdi-delete-forever"
                                                                    style="margin-right: 10px; font-size: 2vh;color: red;"></i>
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
