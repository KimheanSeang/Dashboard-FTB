@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content" style="margin-bottom: 42vh;">
        <nav class="page-breadcrumb" style="display: flex">
            <ol class="breadcrumb">
                <a href="{{ route('export') }}" class="btn btn-danger">Download Xlsx</a>
            </ol>

        </nav>

        <div class="row profile-body" style="margin-top: -10px">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Import Permission</h6>
                                <form class="forms-sample" method="POST" action="{{ route('import') }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Xlsx Import</label>
                                        <input type="file" name="import_file" class="form-control "
                                            placeholder="Input Permission Name">

                                    </div>

                                    <button type="submit" class="btn btn-warning me-2">Upload</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
@endsection
