@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb" style="display: flex">
            @if (Auth::user()->can('add.permission'))
                <ol class="breadcrumb">
                    <a href="{{ route('add.permission') }}" class="btn btn-info"><i class="mdi mdi-plus-circle-outline"
                            style="margin-right: 10px"></i>Add Permrission</a>
                </ol>
            @endif
            &nbsp; &nbsp; &nbsp;
            @if (Auth::user()->can('import.permission'))
                <ol class="breadcrumb">
                    <a href="{{ route('import.permission') }}" class="btn btn-warning">Import</a>
                </ol>
            @endif
            &nbsp; &nbsp; &nbsp;
            @if (Auth::user()->can('export.permission'))
                <ol class="breadcrumb">
                    <a href="{{ route('export') }}" id="export" class="btn btn-danger">Export</a>
                </ol>
            @endif
        </nav>
        <div class="row" style="margin-top: -10px">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Permission</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permission Name</th>
                                        <th>Group Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->group_name }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.permission'))
                                                    <a href="{{ route('edit.permission', $item->id) }}"
                                                        class="btn btn-warning">
                                                        Edit</a>
                                                @endif
                                                @if (Auth::user()->can('delete.permission'))
                                                    <a href="{{ route('delete.permission', $item->id) }}"
                                                        class="btn btn-danger" id="deletepermission">Delete</a>
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
