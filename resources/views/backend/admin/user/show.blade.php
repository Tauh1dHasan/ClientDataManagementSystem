@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ul>
            <h1 class="page-header mb-0">User Details</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
            <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="#" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            @if ($user->userInfo->image)
                                <img src="{{ asset('storage/users/' . $user->userInfo->image) }}" alt="Photo" style="max-width: 80px;">
                            @else
                                <img src="{{ asset('blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Full Name:</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{$user->name_en}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label" for="role_id">Role:</label>
                            <input type="text" class="form-control" name="role_id" id="role_id" value="{{$user->role->name_en ?? 'N/A'}}" disabled />
                        </div>
                    </div>

                    {{-- @if ($user->office)
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="office_id">Office:</label>
                                <input type="text" class="form-control" name="office_id" id="office_id" value="{{$user->office->name_en ?? 'N/A'}}" disabled />
                            </div>
                        </div>
                    @endif --}}

                    @if ($user->userInfo->designation)
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="designation_id">Designation:</label>
                                <input type="text" class="form-control" name="designation_id" id="designation_id" value="{{$user->userInfo->designation->name_en ?? 'N/A'}}" disabled />
                            </div>
                        </div>
                    @endif

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Mobile:</label>
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile ?? 'N/A'}}" disabled/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email ?? 'N/A'}}" disabled/>
                        </div>
                    </div>

                    @if ($user->userAddress->present_address)
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="designation_id">Present Address:</label>
                                <textarea class="form-control" name="present_address" row="2" disabled>{{$user->userAddress->present_address ?? 'N/A'}}</textarea>
                            </div>
                        </div>
                    @endif

                    @if ($user->userAddress->permanent_address)
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="designation_id">Permanent Address:</label>
                                <textarea class="form-control" name="permanent_address" row="2" disabled>{{$user->userAddress->permanent_address ?? 'N/A'}}</textarea>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Status:</label>
                            @if ($user->status == 1)
                                <input class="form-control form-control-solid text-success" value="Active" disabled/>
                            @elseif ($user->status == 0)
                                <input class="form-control form-control-solid text-dark" value="Blocked" disabled/>
                            @elseif ($user->status == 2)
                                <input class="form-control form-control-solid text-danger" value="Deleted" disabled/>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Created Datetime:</label>
                            <input type="text" class="form-control" value="{{ date('d M, Y', strtotime($user->created_at))}}" disabled />
                        </div>
                    </div>

                    @if ($user->updated_at)
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label">Updated Datetime:</label>
                                <input type="text" class="form-control" value="{{ date('d M, Y', strtotime($user->updated_at))}}" disabled />
                            </div>
                        </div>
                    @endif

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
    @endsection
