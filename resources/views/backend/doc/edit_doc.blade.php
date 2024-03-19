@extends('admin.doc')
@section('admin')
    <main>
        <div class="container2">
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
                        <div class="form-group mt-2">
                            <button type="submit" name="submit" class="btn btn-warning">Save Change</button>
                            <a href="{{ route('all.doc') }}"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
