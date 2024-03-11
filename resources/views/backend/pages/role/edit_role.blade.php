@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Edit Role</h6>
                                <form class="forms-sample" method="POST" action="{{ route('update.roles') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $roles->id }}"
                                        class="p-1 border-spacing-0 mb-1 col-md-12 ">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Roles Nmae</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Input Roles Name" value="{{ $roles->name }}">
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
        </div>
    </div>
@endsection
