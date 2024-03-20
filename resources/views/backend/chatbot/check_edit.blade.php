@extends('admin.main')
@section('admin')
    <main>
        <div class="container2">
            <div class="wrapper">
                <form action="{{ route('update_check.chatbot', ['id' => $title->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Replace with your PHP file name -->
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 14px;">Input Response Code</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Response Code" value="{{ $title->title }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" style="font-size: 14px;">Input Error Message</label>
                                <input type="text" name="short_description" id="short_description" class="form-control"
                                    placeholder="Enter Error Message" value="{{ $title->short_description }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description">{{ $title->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-warning">Save Change</button>
                        <a href="{{ route('check.knowledge') }}"><button type="button"
                                class="btn btn-danger">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
