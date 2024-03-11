@extends('admin.doc')
@section('admin')
    <main>

        <div class="container2">
            <a href="{{ route('approve.doc') }}"><i data-feather="arrow-left-circle"></i></a>
            <div class="col-md-8 offset-md-2">
                <div class="card-body">
                    <form>
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="filename">File Name:</label>
                            <input type="text" name="filename" class="form-control" id="filename" readonly
                                value="{{ $data->filename }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" required
                                value="{{ $data->title }}">
                        </div>
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description" class="form-control">{{ $data->description }}</textarea>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
