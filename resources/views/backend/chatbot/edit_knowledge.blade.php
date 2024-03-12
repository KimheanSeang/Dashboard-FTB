@extends('admin.main')
@section('admin')
    <main>
        <div class="container2">

            <div class="wrapper">
                <a href="{{ route('knowledge.chatbot') }}"><i class="mdi mdi-backspace" style="font-size: 20px"></i></a>
                <form action="{{ route('update.chatbot', ['id' => $title->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Replace with your PHP file name -->
                    <div class="form-group">
                        <label for="title">Input Response Code :</label>
                        <input type="text" name="title" class="form-control" id="title" required
                            value="{{ $title->title }}">
                    </div>
                    <div class="form-group">
                        <label for="short_description">Input Error Message :</label>
                        <input type="text" name="short_description" class="form-control" id="short_description" required
                            value="{{ $title->short_description }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description">{{ $title->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
