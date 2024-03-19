@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            @if (Auth::user()->can('add.doc'))
                <ol class="breadcrumb">
                    <a href="{{ route('add.doc') }}" class="btn btn-info"><i class="mdi mdi-plus-circle-outline"
                            style="margin-right: 10px"></i>Upload
                        Document</a>
                </ol>
            @endif
        </nav>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Document</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Uploaded By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filenames as $key => $file)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $file->filename }}</td>
                                            <td>{{ $file->title }}</td>
                                            <td onmouseover="this.innerHTML='{{ substr($file->description, 0, 30) }}' "
                                                onmouseout="this.innerHTML='{{ $file->description }}'">
                                                {{ substr($file->description, 0, 30) }}</td>
                                            <td>{{ $file->uploaded_by }}</td>
                                            <td>
                                                @if (Auth::user()->can('file.doc'))
                                                    <a href="{{ route('view.doc', $file->id) }}" class="btn btn-primary"
                                                        target="_blank">View File</a>
                                                @endif
                                                @if (Auth::user()->can('data.doc'))
                                                    <a href="{{ route('show.doc', $file->id) }}" class="btn btn-info">
                                                        View Data
                                                    </a>
                                                @endif
                                                @if (Auth::user()->can('edit.doc'))
                                                    <a href="{{ route('edit.doc', $file->id) }}" class="btn btn-warning">
                                                        Edit</a>
                                                @endif
                                                @if (Auth::user()->can('delete.doc'))
                                                    <a href="{{ route('delete.doc', $file->id) }}" class="btn btn-danger"
                                                        id="delete">
                                                        Delete</a>
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
