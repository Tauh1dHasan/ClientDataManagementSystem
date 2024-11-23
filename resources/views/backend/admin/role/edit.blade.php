@extends('backend.layouts.app')

@section('content')
    <div id="content" class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('alerts.alerts')
                    
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                                <li class="breadcrumb-item active">Edit Role</li>
                            </ul>

                            <h1 class="page-header mb-0">Edit Role</h1>
                        </div>

                        <div class="ms-auto">
                            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="role_name_bn">Role Name (Bangla): <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="role_name_bn" name="role_name_bn" value="{{ $role->name_bn ?? 'N/A' }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="role_name_en">Role Name (English): <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="role_name_en" name="role_name_en" value="{{ $role->name_en ?? 'N/A' }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="display_name">Display Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $role->display_name ?? 'N/A' }}" required/>
                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary mt-4" style="float: right;" type="submit">Update</button>
                            </form>
                        </div>

                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
