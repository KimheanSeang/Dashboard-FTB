{{-- @extends('admin.doc')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Create Task</h6>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" method="POST" action="{{ route('store.todo') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="exampleInputName" class="form-label">Title</label>
                                    <div class="form-group mb-1">
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            required>
                                    </div>
                                    <label for="exampleInputRoleName" class="form-label">Name User</label>
                                    <div class="form-group mb-1">
                                        <select name="user_task" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="description">Description:</label>
                                    <textarea id="myTextarea" name="description"></textarea>
                                    <button type="submit" class="btn btn-warning me-2 mt-2">Create Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@extends('admin.doc')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Create Task</h6>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" method="POST" action="{{ route('store.todo') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="exampleInputName" class="form-label">Title</label>
                                    <div class="form-group mb-1">
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            required>
                                    </div>
                                    <label for="exampleInputRoleName" class="form-label">Select User</label>
                                    <div class="form-group mb-1">
                                        <select id="mySelect" name="user_task" style="width: 50%">
                                            <option selected="" disabled="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="description">Description:</label>
                                    <textarea id="myTextarea" name="description"></textarea>
                                    <button type="submit" class="btn btn-warning me-2 mt-2">Create Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
