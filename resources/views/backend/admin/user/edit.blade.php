@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Update user</li>
            </ul>
            <h1 class="page-header mb-0">Update user</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.user.update', $user->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Upload Picture: </label>
                            <input class="form-control" type="file" name="image" accept=".png, .jpg, .jpeg" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Full Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{$user->name_en ?? 'N/A'}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="role_id">Role: <span class="text-danger">*</span></label>
                            <select class="form-select" name="role_id" id="role_id" required>
                                {{-- <option value="">--Select Role--</option>  --}}
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Mobile: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile ?? 'N/A'}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{$user->email ?? 'N/A'}}" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Department: <span class="text-danger">*</span></label>
                            <select class="form-select" name="department_id" id="department_id" required>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" @if($user->userInfo->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Designation: <span class="text-danger">*</span></label>
                            <select class="form-select" name="designation_id" id="designation_id" required>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" @if($user->userInfo->designation_id == $designation->id) selected @endif>{{ $designation->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Present Address:</label>
                            <textarea class="form-control" name="present_address" row="2">{{$user->userAddress->present_address ?? 'N/A'}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Permanent Address:</label>
                            <textarea class="form-control" name="permanent_address" row="2">{{$user->userAddress->permanent_address ?? 'N/A'}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Status: <span class="text-danger">*</span></label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="1" @if($user->status == 1) selected @endif>Active</option>
                                <option value="0" @if($user->status == 0) selected @endif>Block</option>
                                <option value="2" @if($user->status == 2) selected @endif>Delete</option>
                            </select>
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
