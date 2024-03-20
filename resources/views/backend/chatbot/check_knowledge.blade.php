@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Chat Knowledge</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Message</th>
                                        <th>Question</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($knowledge as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->short_description }}</td>
                                            <td>
                                                @if (Auth::user()->can('view.check_knowledge'))
                                                    <a href="{{ route('view_knowledge.chatbot', $item->id) }}"
                                                        class="btn btn-warning">View</a>
                                                @endif
                                                {{-- @if (Auth::user()->can('edit.')) --}}
                                                <a href="{{ route('edit_check.chatbot', $item->id) }}"
                                                    class="btn btn-primary" title="edit">Edit</a>
                                                {{-- @endif --}}
                                                @if (Auth::user()->can('approve.knowledge'))
                                                    <a href="{{ route('approve.knowledge', $item->id) }}"
                                                        id="approveknowledge" class="btn btn-info">
                                                        Approve</a>
                                                @endif
                                                @if (Auth::user()->can('delete.check_knowledge'))
                                                    <a href="{{ route('delete.data', $item->id) }}" class="btn btn-danger"
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
