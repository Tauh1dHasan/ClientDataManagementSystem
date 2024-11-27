@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Add New Client</li>
            </ul>
            <h1 class="page-header mb-0">Add New Client</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.clientInfo.update', $clientInfo->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    
                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="name" class="form-label">Client Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name of Client" value="{{$clientInfo->name}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="photo">Client Photo: </label>
                            <input class="form-control" type="file" id="photo" name="photo" accept=".png, .jpg, .jpeg" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Valid Email Address" value="{{$clientInfo->email}}"/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile Number:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Valid Mobile Number" value="{{$clientInfo->mobile}}"/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="nid" class="form-label">CF/NID Number:</label>
                            <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter Valid NID Number" value="{{$clientInfo->nid}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your current address" value="{{$clientInfo->address}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="notes" class="form-label">Notes:</label>
                            <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter your current notes" value="{{$clientInfo->notes}}" />
                        </div>
                    </div>

                </div>

                <button class="btn btn-outline-primary btn-primary mt-4 text-white" style="float: right;" type="submit">Update</button>
                

            </form>

        </div>
            
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        
    </div>
    @endsection
