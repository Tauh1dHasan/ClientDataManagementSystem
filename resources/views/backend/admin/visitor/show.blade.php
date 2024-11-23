@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Visitor Details</li>
            </ul>
            <h1 class="page-header mb-0">Visitor Details</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
            <a href="{{route('admin.visitor.edit', $visitor->id)}}" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="#" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            @if ($visitor->image)
                                <img src="{{ asset('storage/userImages/' . $visitor->image) }}" alt="Photo" style="max-width: 80px;">
                            @else
                                <img src="{{ asset('blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Full Name (English):</label>
                            <input type="text" class="form-control" value="{{$visitor->user->name_en}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Full Name (Bangla):</label>
                            <input type="text" class="form-control" value="{{$visitor->user->name_bn}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Date Of Birth:</label>
                            <input type="date" class="form-control" value="{{$visitor->dob ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Mobile number:</label>
                            <input type="text" class="form-control" value="{{$visitor->user->mobile ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Email Address:</label>
                            <input type="email" class="form-control" value="{{$visitor->user->email ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Gender:</label>
                            <input type="text" class="form-control" value="{{$visitor->gender ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">NID Number:</label>
                            <input type="text" class="form-control" value="{{$visitor->nid_no ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Passport Number:</label>
                            <input type="text" class="form-control" value="{{$visitor->passport_no ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Driving License Number:</label>
                            <input type="text" class="form-control" value="{{$visitor->driving_license_no ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Organization Name:</label>
                            <input type="text" class="form-control" value="{{$visitor->visitor_organization ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Designation:</label>
                            <input type="text" class="form-control" value="{{$visitor->visitor_designation ?? NUll}}" disabled />
                        </div>
                    </div>

                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <label class="form-label">Visitor Address:</label>
                            <input type="text" class="form-control" value="{{$visitor->address ?? NUll}}" disabled />
                        </div>
                    </div>

                    @can('update_visitor_status')
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label class="form-label">Visitor Status:</label>
                                @if (($visitor->user->status ?? 2) == 1)
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateVisitorStatus{{$visitor->user_id}}">Approved</button>
                                @else
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateVisitorStatus{{$visitor->user_id}}">Pending</button>
                                @endif
                            </div>
                        </div>
                    @endcan

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

    <div class="modal fade" id="updateVisitorStatus{{$visitor->user_id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Update Visitor Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.visitor.updateStatus', $visitor->user_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
    
                            <div class="col-12">
                                <div>
                                    <label for="visitor_status" class="form-label">Visitor Status<span style="color:red;">*</span></label>
                                    <select id="visitor_status" autocomplete="off" class="form-select" name="visitor_status" required>
                                        <option value="">--Select Status--</option>
                                        <option value="0" @if(($visitor->user->status ?? 2) != 1) selected @endif>Pending</option>
                                        <option value="1" @if(($visitor->user->status ?? 2) == 1) selected @endif>Approve</option>
                                    </select>
    
                                </div>
                            </div>
    
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
