@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb" style="display: flex">
            <ol class="breadcrumb">
                @if (Auth::user()->can('add.roles'))
                    <a href="{{ route('add.roles') }}" class="btn btn-info">Add Roles</a>
                @endif
            </ol>

        </nav>
        <div class="row" style="margin-top: -10px">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Roles</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Roles Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.role'))
                                                    <a href="{{ route('edit.roles', $item->id) }}" class="btn btn-warning">
                                                        Edit</a>
                                                @endif
                                                @if (Auth::user()->can('delete.role'))
                                                    <a href="{{ route('delete.roles', $item->id) }}" class="btn btn-danger"
                                                        id="deleterole">Delete</a>
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
