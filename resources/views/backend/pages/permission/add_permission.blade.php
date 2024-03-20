@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content" style="margin-bottom: 38vh;">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add Permission</h6>
                                <form class="forms-sample" method="POST" action="{{ route('store.permission') }}">

                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Permission Nmae</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Input Permission Name">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Nmae</label>
                                        <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Group</option>
                                            <option value="role">Role & Permission</option>
                                            <option value="user">User Mgt</option>
                                            <option value="chatbot">ChatBot</option>
                                            <option value="read">Read</option>
                                            <option value="doc">Document</option>
                                            <option value="document-approval">Document Approval</option>
                                            <option value="report">Report</option>
                                            <option value="task">Task</option>
                                            <option value="checktask">CheckTask</option>
                                            <option value="assessment">Assessment</option>
                                        </select>
                                        @error('group_name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-warning me-2">Save Permission</button>
                                    <a href="{{ route('all.permission') }}" type="button" class="btn btn-danger">Cancel</a>

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
