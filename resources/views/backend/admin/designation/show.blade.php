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
                                <li class="breadcrumb-item active">Designation Details</li>
                            </ul>

                            <h1 class="page-header mb-0">Designation Details</h1>
                        </div>

                        <div class="ms-auto">
                            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-2">
                                <label for="name_en" class="col-sm-2 col-form-label">Designation Name (English): </label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name_en" value="{{ $designation->name_en }}" readonly>
                                </div>

                                <label for="name_bn" class="col-sm-2 col-form-label">Designation Name (Bangla): </label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name_bn" value="{{ $designation->name_bn }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                
                                @if ($designation->created_by != NULL)
                                    <label for="created_by" class="col-sm-2 col-form-label">Created By: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="created_by" value="{{ $designation->createdBy->name_en ?? '' }} {{ $designation->createdBy->last_name ?? '' }}" readonly>
                                    </div>    
                                @endif

                                @if($designation->updated_by != NULL)
                                    <label for="updated_by" class="col-sm-2 col-form-label">Updated By: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="updated_by" value="{{ $designation->updatedBy->name_en ?? '' }} {{ $designation->updatedBy->last_name ?? '' }}" readonly>
                                    </div>
                                @endif
                                

                            </div>

                            <div class="form-group row mb-2">
                                <label for="status" class="col-sm-2 col-form-label">Status: </label>

                                <div class="col-sm-4 mt-2">
                                    @if ($designation->status == 1)
                                        <span class="badge bg-transparent border border-success text-theme fs-12px fw-500 rounded-sm">Active</span>
                                    @else
                                        <span class="badge bg-transparent border border-danger text-danger fs-12px fw-500 rounded-sm">Inactive</span>
                                    @endif
                                </div>
                            </div>
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
