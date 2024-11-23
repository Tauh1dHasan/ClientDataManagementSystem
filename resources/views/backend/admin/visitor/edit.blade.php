@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Update Visitor</li>
            </ul>
            <h1 class="page-header mb-0">Update Visitor</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.visitor.update')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{$visitor->user_id}}" required>
                <input type="hidden" name="visitor_id" value="{{$visitor->id}}" required>

                <div class="row">
                    
                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="name_en" class="form-label">Full Name (English): <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter Full Name in English" value="{{$visitor->user->name_en ?? 'N/A'}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="name_bn" class="form-label">Full Name (Bangla):</label>
                            <input type="text" class="form-control" id="name_bn" name="name_bn" placeholder="Enter Full Name in Bangla" value="{{$visitor->user->name_bn ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="dob" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" value="{{$visitor->dob ?? NULL}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="mobile" class="form-label">Mobile Number: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Valid Mobile Number" value="{{$visitor->user->mobile ?? 'N/A'}}" minlength="11" maxlength="14" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Valid Email Address" value="{{$visitor->user->email ?? 'N/A'}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender:</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="">--Select Gender--</option>
                                <option value="Male" @if($visitor->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($visitor->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if($visitor->gender == 'Other') selected @endif>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="nid_no" class="form-label">NID Number:</label>
                            <input type="text" class="form-control" id="nid_no" name="nid_no" placeholder="Enter Valid NID Number" value="{{$visitor->nid_no ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="passport_no" class="form-label">Passport Number:</label>
                            <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="Enter Valid Passport Number" value="{{$visitor->passport_no ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="driving_license_no" class="form-label">Driving License Number:</label>
                            <input type="text" class="form-control" id="driving_license_no" name="driving_license_no" placeholder="Enter Valid Driving License Number" value="{{$visitor->driving_license_no ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="image">Image: </label>
                            <input class="form-control" type="file" id="image" name="image" accept=".png, .jpg, .jpeg" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="visitor_organization" class="form-label">Organization:</label>
                            <input type="text" class="form-control" id="visitor_organization" name="visitor_organization" placeholder="Enter Organization Name" value="{{$visitor->visitor_organization ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="visitor_designation" class="form-label">Designation:</label>
                            <input type="text" class="form-control" id="visitor_designation" name="visitor_designation" placeholder="Enter Designation" value="{{$visitor->visitor_designation ?? 'N/A'}}" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your current address" value="{{$visitor->address ?? 'N/A'}}" />
                        </div>
                    </div>

                </div>

                <button class="btn btn-outline-success btn-success mt-4 text-white" style="float: right;" type="submit">Update</button>
                

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
