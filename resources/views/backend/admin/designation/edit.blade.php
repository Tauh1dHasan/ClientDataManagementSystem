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
                                <li class="breadcrumb-item"><a href="{{ route('admin.designation.index') }}">Manage Designation</a></li>
                                <li class="breadcrumb-item active">Edit Designation</li>
                            </ul>

                            <h1 class="page-header mb-0">Edit Designation</h1>
                        </div>

                        <div class="ms-auto">
                            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.designation.update', $designation->id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name_en">Designation Name (English): <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter Designation Name (English)" value="{{ $designation->name_en }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name_bn">Designation Name (Bangla): <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" id="name_bn" name="name_bn" placeholder="Enter Designation Name (Bangla)" value="{{ $designation->name_bn }}" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="ex-search">Status: <span class="text-danger">*</span></label>

                                            <select class="selectpicker form-select" id="ex-search" name="status">
                                                <option value="1" {{ $designation->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $designation->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <button class="btn btn-primary mt-4" style="float: right;" type="submit">Update</button>
                                    </div>
                                </div>
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
