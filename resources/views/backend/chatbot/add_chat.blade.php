@extends('admin.main')
@section('admin')
    <main>
        <div class="container2">
            <div class="wrapper">
                {{-- <form method="post" enctype="multipart/form-data" action="{{ route('add.chatbot') }}"> --}}
                <form method="post" enctype="multipart/form-data" action="{{ route('store.chatbot') }}">
                    @csrf
                    <!-- Replace with your PHP file name -->
                    <h2 style="text-align: center; font-size: 20px;">Store Chatbot Knowledge</h2>
                    <div class="form-group">
                        <label for="title">Input Response Code :</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Input Error Message :</label>
                        <input type="text" name="short_description" class="form-control" id="short_description" required>
                    </div>
                    <div class="form-group">
                        {{-- <label for="description">Description:</label> --}}
                        <textarea id="myTextarea" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
