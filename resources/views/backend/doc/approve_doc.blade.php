@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Documents</h6>
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
                                            {{-- <td title="{{ $file->description }}">
                                                {{ \Illuminate\Support\Str::limit($file->description, 20) }}
                                            </td> --}}
                                            <td onmouseover="this.innerHTML='{{ substr($file->description, 0, 30) }}' "
                                                onmouseout="this.innerHTML='{{ $file->description }}'">
                                                {{ substr($file->description, 0, 30) }}</td>
                                            <td>{{ $file->uploaded_by }}</td>
                                            <td>
                                                @if (Auth::user()->can('view.approve'))
                                                    <a href="{{ route('view_file.doc', $file->id) }}"
                                                        class="btn btn-primary" target="_blank">View File</a>
                                                @endif
                                                @if (Auth::user()->can('view_data.approve'))
                                                    <a href="{{ route('view_doc.doc', $file->id) }}" class="btn btn-info">
                                                        View Data
                                                    </a>
                                                    @if (Auth::user()->can('edit.approve'))
                                                        <a href="{{ route('edit_approve.doc', $file->id) }}"
                                                            class="btn btn-warning">
                                                            Edit</a>
                                                    @endif
                                                @endif
                                                @if (Auth::user()->can('Approve-Document'))
                                                    <a href="{{ route('approve_doc.doc', $file->id) }}"
                                                        class="btn btn-success" id="approve">
                                                        Approve</a>
                                                @endif
                                                @if (Auth::user()->can('delete.approve'))
                                                    <a href="{{ route('approve_delete.doc', $file->id) }}"
                                                        class="btn btn-danger" id="approve">
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
