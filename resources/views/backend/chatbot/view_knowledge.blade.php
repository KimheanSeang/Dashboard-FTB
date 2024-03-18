@extends('admin.main')
@section('admin')
    <main>
        <div class="container2">
            <div class="wrapper">
                <a href="{{ route('check.knowledge') }}"><i class="mdi mdi-arrow-left-bold-circle"
                        style="font-size: 25px; color: blue"></i></a>
                <form method="post" enctype="multipart/form-data" action="{{ route('store.chatbot') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Input Response Code :</label>
                        <input type="text" name="title" class="form-control" id="title" required
                            value="{{ $data->title }}">
                    </div>
                    <div class="form-group">
                        <label for="short_description">Input Error Message :</label>
                        <input type="text" name="short_description" class="form-control" id="short_description" required
                            value="{{ $data->short_description }}">
                    </div>
                    <div class="form-group">
                        <textarea id="myTextarea" name="description">{{ $data->description }}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
