@extends('admin.doc')
@section('admin')
    <main>
        <div class="container2">
            <div class="col-md-8 offset-md-2">
                <div class="card-body">
                    <form action="{{ route('store.doc') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <i data-feather="alert-circle"></i>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif


                        <h2 style="text-align: center; font-size: 20px;">Store Document</h2>
                        <div class="form-group">
                            <input type="file" name="file1[]" class="form-control-file" id="file1" multiple>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <label for="description">Description:</label>
                        <textarea id="myTextarea" name="description"></textarea>
                        <div class="form-group mt-2">
                            <input type="submit" name="submit" value="Upload Docs" class="btn btn-warning">
                            <a href="{{ route('all.doc') }}" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
