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
                                <li class="breadcrumb-item"><a href="{{ route('admin.designation.index') }}">Manage Office Category</a></li>
                                <li class="breadcrumb-item active">Edit Office Category</li>
                            </ul>

                            <h1 class="page-header mb-0">Edit Office Category</h1>
                        </div>

                        <div class="ms-auto">
                            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.officeCategory.update', $officeCat->id) }}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Office Category Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $officeCat->name_en }}" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-check form-switch mt-4">
                                            <label class="form-label" for="status">Status:</label>
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" @if($officeCat->status == 1) checked @endif/>
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
