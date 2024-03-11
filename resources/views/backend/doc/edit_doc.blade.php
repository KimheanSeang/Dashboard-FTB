@extends('admin.doc')
@section('admin')
    <main>
        <div class="container2">
            <a href="{{ route('all.doc') }}"><i data-feather="arrow-left-circle"></i></a>
            <div class="col-md-8 offset-md-2">
                <div class="card-body">
                    <form action="{{ route('update.doc', ['id' => $filenames->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $filenames->id }}">
                        <div class="form-group">
                            <label for="filename">File Name:</label>
                            <input type="text" name="filename" class="form-control" id="filename" readonly
                                value="{{ $filenames->filename }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" required
                                value="{{ $filenames->title }}">
                        </div>
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description">{{ $filenames->description }}</textarea>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save" class="btn btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
