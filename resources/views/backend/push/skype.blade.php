@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Push Message to Skype Group </h6>
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title1" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title 2</label>
                                        <input type="text" name="title2" class="form-control"
                                            placeholder="Enter Title 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">To</label>
                                        <input type="text" name="user1" class="form-control" placeholder="Enter User1">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">And</label>
                                        <input type="text" name="user2" class="form-control" placeholder="Enter User2">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">And</label>
                                        <input type="text" name="user3" class="form-control" placeholder="Enter User3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Message1</label>
                                        <input type="text" name="message1" class="form-control" placeholder="Message1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Message2</label>
                                        <input type="text" name="message2" class="form-control" placeholder="Message2">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Description"
                                    rows="8"></textarea>
                            </div>
                        </form>
                        <button type="button" class="btn btn-warning submit"><i class="mdi mdi-near-me "
                                style="margin-right: 2vh"></i>Push Message</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
