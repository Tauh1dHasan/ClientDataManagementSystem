@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Create new user</li>
            </ul>
            <h1 class="page-header mb-0">Create new user</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.user.store')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Upload Photo: </label>
                            <input class="form-control" type="file" name="image" accept=".png, .jpg, .jpeg" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Full Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter First Name" value="{{old('name')}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="role_id">Role: <span class="text-danger">*</span></label>
                            <select class="form-select" name="role_id" id="role_id" required>
                                <option value="">--Select Role--</option> 
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Mobile: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" minlength="11" maxlength="14" value="{{old('mobile')}}" required />
                        </div>
                    </div>


                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{old('email')}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Department: <span class="text-danger">*</span></label>
                            <select class="form-select" name="department_id" id="department_id" required>
                                <option value="">--Select Department--</option> 
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Designation: <span class="text-danger">*</span></label>
                            <select class="form-select" name="designation_id" id="designation_id" required>
                                <option value="">--Select Designation--</option> 
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Minimum 8 Characters" value="{{old('password')}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Present Address:</label>
                            <textarea class="form-control" name="present_address" row="2" placeholder="Enter present address">{{old('present_address')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Permanent Address:</label>
                            <textarea class="form-control" name="permanent_address" row="2" placeholder="Enter permanent address">{{old('permanent_address')}}</textarea>
                        </div>
                    </div>
                    
                </div>

                <button class="btn btn-outline-primary btn-primary mt-4 text-white" style="float: right;" type="submit">Submit</button>
                

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
