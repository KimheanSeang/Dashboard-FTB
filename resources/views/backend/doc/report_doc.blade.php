@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Document Report</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Decription</th>
                                        <th>Deleted By</th>
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
                                            <td>{{ $file->delete_by }}</td>
                                            <td>{{ $file->uploaded_by }}</td>
                                            <td>
                                                @if (Auth::user()->can('recover.report'))
                                                    <a href="{{ route('backup.recover', $file->id) }}"
                                                        class="btn btn-success" id="recover">
                                                        Recover</a>
                                                @endif
                                                @if (Auth::user()->can('delete.report'))
                                                    <a href="{{ route('delete.recover', $file->id) }}"
                                                        class="btn btn-danger" id="delete">
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
