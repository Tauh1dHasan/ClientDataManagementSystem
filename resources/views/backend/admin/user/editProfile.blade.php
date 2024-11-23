@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Update profile</li>
            </ul>
            <h1 class="page-header mb-0">Update profile</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.user.updateProfile', $user->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Upload Picture: </label>
                            <input class="form-control" type="file" name="image" accept="image/png, image/gif, image/jpeg" />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{$user->name_en}}" required />
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


    


    <div class="card mt-4">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div>
                    <h1 class="page-header mb-0">Update Password</h1>
                </div>
            </div>
            <form action="{{route('admin.user.updatePassword', $user->id)}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Current Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="current_password" placeholder="Enter Current Password" required />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">New Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Enter New Password" required />
                            <p class="text-danger"><small>Password must be at least 8 character</small></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Confirm Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required />
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
