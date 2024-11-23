@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Create New Appointment</li>
            </ul>
            <h1 class="page-header mb-0">Create New Appointment</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>

    <div class="card">
        
           
        <div class="card-body">
            <form action="{{route('admin.appointment.store')}}" method="post" id="kt_form_1" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    @if (($user->role_id != 3) && ($user->role_id != 4))
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="visitor_user_id" class="form-label">Select Visitor:<span class="text-danger">*</span></label>
                                <select class="form-select select2" name="visitor_user_id" id="visitor_user_id" required>
                                    <option value="">--Select Visitor--</option>
                                    @foreach ($visitors as $visitor)
                                        <option value="{{ $visitor->id }}" data-vorg="{{$visitor->userInfo->visitor_organization ?? '-'}}" data-vdes="{{$visitor->userInfo->visitor_designation ?? '-'}}" >{{$visitor->name_en}} - {{$visitor->userInfo->visitor_organization ?? '-'}} - {{$visitor->userInfo->visitor_designation ?? '-'}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="visitor_organization" class="form-label">Visitor Organization:</label>
                                <input type="text" class="form-control" id="visitor_organization" name="visitor_organization" placeholder="Enter Visitor Organization" value="{{old('visitor_organization')}}" />
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="visitor_designation" class="form-label">Visitor Designation:</label>
                                <input type="text" class="form-control" id="visitor_designation" name="visitor_designation" placeholder="Enter Visitor Designation" value="{{old('visitor_designation')}}" />
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="visitor_user_id" value="{{$user->id}}">
                        <input type="hidden" name="visitor_organization" value="{{$user->userInfo->visitor_organization ?? '-'}}">
                        <input type="hidden" name="visitor_designation" value="{{$user->userInfo->visitor_designation ?? '-'}}">
                    @endif

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="host_user_id" class="form-label">Select Host:<span class="text-danger">*</span></label>
                            <select class="form-select select2" name="host_user_id" id="host_user_id" required>
                                <option value="">--Select Host--</option>
                                @foreach ($hosts as $host)
                                    <option value="{{ $host->id }}">{{$host->name_en}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="appointment_date" class="form-label">Appointment Date:<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Select Appointment Date" value="{{old('appointment_date')}}" required/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="appointment_time" class="form-label">Appointment Time:<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="appointment_time" name="appointment_time" placeholder="Select Appointment Time" value="{{old('appointment_time')}}" required/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="toatl_attendees_no" class="form-label">Total Attendees No:<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="toatl_attendees_no" name="toatl_attendees_no" placeholder="Enter Total Attendees No" value="{{old('toatl_attendees_no')}}" required/>
                        </div>
                    </div>

                    <div class="col-md-8 mb-3">
                        <div class="form-group">
                            <label for="appointment_purpose" class="form-label">Appointment Purpose:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="appointment_purpose" name="appointment_purpose" placeholder="Enter Appointment Purpose" value="{{old('appointment_purpose')}}" required/>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="purpose_describe" class="form-label">Appointment Purpose Describe:</label>
                            <textarea class="form-control" rows="5" name="purpose_describe" id="purpose_describe" placeholder="Enter Appointment Purpose">{{old('purpose_describe')}}</textarea>
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

    @push('script')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-results__option--selectable {
            background: #151a15bd !important;
        }
        .select2-results__option--selectable:hover {
            background: #4b6f4bbd !important;
        }
        .select2-selection__rendered{
            color: #cad1d3 !important;
            background: #263845;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#visitor_user_id").change(function(){
                let vorg = ($(this).find(':selected').data('vorg'));
                let vdes = ($(this).find(':selected').data('vdes'));

                $("#visitor_organization").val(vorg);
                $("#visitor_designation").val(vdes);
            });
        });
    </script>
    @endpush