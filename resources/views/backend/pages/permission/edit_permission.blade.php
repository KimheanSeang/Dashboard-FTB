@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">


        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add Permission</h6>
                                <form class="forms-sample" method="POST" action="{{ route('update.permission') }}">

                                    @csrf
                                    <input type="hidden" name="id" value="{{ $permission->id }}"
                                        class="p-1 border-spacing-0 mb-1 col-md-12 ">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Permission Nmae</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $permission->name }}" placeholder="Input Permission Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Nmae</label>
                                        <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                            <option value="role"
                                                {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role &
                                                Permission
                                            </option>
                                            <option value="user"
                                                {{ $permission->group_name == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="chatbot"
                                                {{ $permission->group_name == 'chatbot' ? 'selected' : '' }}>ChatBot
                                            </option>
                                            <option value="doc" {{ $permission->group_name == 'doc' ? 'selected' : '' }}>
                                                Document
                                            </option>
                                            <option value="document-approval"
                                                {{ $permission->group_name == 'document-approval' ? 'selected' : '' }}>
                                                Document Approval
                                            </option>
                                            <option value="read"
                                                {{ $permission->group_name == 'read' ? 'selected' : '' }}>Read
                                            </option>
                                            <option value="report"
                                                {{ $permission->group_name == 'report' ? 'selected' : '' }}>Report
                                            </option>
                                            <option value="task"
                                                {{ $permission->group_name == 'task' ? 'selected' : '' }}>Task
                                            </option>
                                            <option value="checktask"
                                                {{ $permission->group_name == 'checktask' ? 'selected' : '' }}>CheckTask
                                            </option>
                                            <option value="assessment"
                                                {{ $permission->group_name == 'assessment' ? 'selected' : '' }}>Assessment
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Save Permission</button>
                                    <a href="{{ route('all.permission') }}" type="button"
                                        class="btn btn-danger">Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
@endsection
