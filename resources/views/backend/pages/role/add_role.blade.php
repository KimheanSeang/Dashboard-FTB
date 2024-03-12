@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content" style="margin-bottom: 49vh;">


        <div class="row profile-body">

            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add Role</h6>
                                <form class="forms-sample" method="POST" action="{{ route('store.roles') }}">

                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Roles Nmae</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Input Roles Name">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Save Roles</button>
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
