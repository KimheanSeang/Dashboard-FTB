@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Push Message to Telegram Group</h6>
                        <form action="/form-submit" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">To User</label>
                                        <input type="text" id="user1" name="user1" class="form-control"
                                            placeholder="Enter Name User1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">And User</label>
                                        <input id="user2" name="user2" type="text" class="form-control"
                                            placeholder="Enter Name User2">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" id="exampleFormControlTextarea1" rows="12"></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning submit"><i class="mdi mdi-near-me "
                                    style="margin-right: 2vh"></i>Push
                                Message</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
