@extends('admin.main')
@section('admin')
    <main>
        <div class="container2">
            <div class="wrapper">
                <form method="post" enctype="multipart/form-data" action="{{ route('store.chatbot') }}">
                    @csrf
                    <h2 style="text-align: center; font-size: 20px;">Add Chat Knowledge</h2>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 14px;">Input Response Code</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Response Code" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 14px;">Input Error Message</label>
                                <input type="text" name="short_description" id="short_description" class="form-control"
                                    placeholder="Enter Error Message" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    </div>


                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Save Knowledge" class="btn btn-warning">
                        <a href="{{ route('knowledge.chatbot') }}"><button type="button"
                                class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
