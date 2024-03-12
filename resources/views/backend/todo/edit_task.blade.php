@extends('admin.doc')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div style="display: flex">
                                    <a href="{{ route('all.todo') }}">
                                        <i class="mdi mdi-arrow-left-bold-circle" style="font-size: 25px; color:blue;">
                                        </i>
                                    </a>
                                    <h6 class="card-title" style="margin-top:10px; margin-left:20px;">Edit Task</h6>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="forms-sample" method="POST"
                                    action="{{ route('update.todo', ['id' => $task->id]) }}" enctype="multipart/form-data">
                                    @csrf

                                    <label for="exampleInputName" class="form-label">Title</label>
                                    <div class="form-group mb-3">
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                                            required value="{{ isset($task) ? $task->title : '' }}">
                                    </div>
                                    <label for="exampleInputRoleName" class="form-label">Select User</label>

                                    <div class="form-group mb-1">
                                        <select id="mySelect" name="user_task" style="width: 50%">
                                            <option selected="" disabled="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->name == $task->user_task ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="description">Description:</label>
                                    <textarea id="myTextarea" name="description">{{ isset($task) ? $task->description : '' }}</textarea>
                                    <button type="submit" class="btn btn-warning me-2 mt-4">Update Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
