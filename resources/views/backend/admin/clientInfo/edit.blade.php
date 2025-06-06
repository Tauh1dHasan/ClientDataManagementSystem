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
                            <label for="first_name" class="form-label">First Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name of Client" value="{{$clientInfo->first_name}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="last_name" class="form-label">Last Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name of Client" value="{{$clientInfo->last_name}}" required />
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
                            <label for="birth_place" class="form-label">Birth Place:</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{$clientInfo->birth_place}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $clientInfo->date_of_birth ? date('Y-m-d', strtotime($clientInfo->date_of_birth)) : '' }}" />
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
                            <label for="post_code" class="form-label">Post Code / CAP:</label>
                            <input type="text" class="form-control" id="post_code" name="post_code" placeholder="Enter your current post_code" value="{{$clientInfo->post_code}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="city" class="form-label">City / Citta:</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter your current city" value="{{$clientInfo->city}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="province" class="form-label">Province / Prov:</label>
                            <input type="text" class="form-control" id="province" name="province" placeholder="Enter your current province" value="{{$clientInfo->province}}" />
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
