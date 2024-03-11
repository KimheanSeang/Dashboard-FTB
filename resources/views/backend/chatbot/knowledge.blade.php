@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            @if (Auth::user()->can('add.chatbot'))
                <ol class="breadcrumb">
                    <a href="{{ route('add.chatbot') }}" class="btn btn-info">Add Knowledge</a>
                </ol>
            @endif
        </nav>
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
                                        <th>Solution</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($titles as $key => $title)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $title->title }}</td>
                                            <td>{{ $title->short_description }}</td>
                                            <td onmouseover="this.innerHTML='{{ substr($title->description, 0, 30) }}' "
                                                onmouseout="this.innerHTML='{{ $title->description }}'">
                                                {{ substr($title->description, 0, 30) }}</td>
                                            <td>
                                                @if (Auth::user()->can('edit.chatbot'))
                                                    <a href="{{ route('edit.chatbot', $title->id) }}"
                                                        class="btn btn-warning">
                                                        Edit</a>
                                                @endif
                                                @if (Auth::user()->can('delete.chatbot'))
                                                    <a href="{{ route('delete.chatbot', $title->id) }}"
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
