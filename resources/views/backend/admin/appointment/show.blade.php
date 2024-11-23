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
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="host_name" class="form-label">Host Name</label>
                            <input type="text" class="form-control" name="host_name" id="host_name" value="{{$appointment->hostUser->name_en ?? '-'}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="last_name" class="form-label">Visitor Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$appointment->visitorUser->name_en ?? '-'}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="visitor_organization" class="form-label">Visitor Organization</label>
                            <input type="text" class="form-control" name="visitor_organization" id="visitor_organization" value="{{$appointment->visitorUserInfo->visitor_organization ?? '-'}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="visitor_designation" class="form-label">Visitor Designation</label>
                            <input type="text" class="form-control" name="visitor_designation" id="visitor_designation" value="{{$appointment->visitorUserInfo->visitor_designation ?? '-'}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="last_name" class="form-label">Appointment Purpose</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$appointment->appointment_purpose ?? '-'}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="last_name" class="form-label">Appointment Date</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{date('d/m/Y', strtotime($appointment->appointment_date ?? '00-00-00'))}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="last_name" class="form-label">Appointment Time</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{date('h:i a', strtotime($appointment->appointment_time))}}" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xsm-12">
                        <div>
                            <label for="last_name" class="form-label">Total Attendees No</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$appointment->total_attendees_no}}" disabled>
                        </div>
                    </div>
                    
                    @if($appointment->appointment_status == 5)
                        <div class="col-md-4 col-sm-6 col-xsm-12">
                            <div>
                                <label for="last_name" class="form-label">Meeting completion time</label>
                                <input type="text" class="form-control" id="last_name" value="{{date('d-m-Y h i s a',strtotime($appointment->departure_time))}}" disabled>
                            </div>
                        </div>
                    @endif

                    
                    <div class="col-md-12">
                        <div>
                            <label for="purpose_describe" class="form-label">Appointment Purpose Describe</label>
                            <textarea class="form-control" rows="3" name="purpose_describe" id="purpose_describe" placeholder="Enter Appointment Purpose" disabled>{{$appointment->purpose_describe}}</textarea>
                        </div>
                    </div>

                    @if(($appointment->card_number) && ($appointment->card_number != ''))
                        <div class="col-md-4 col-sm-6 col-xsm-12">
                            <div>
                                <label for="card_number" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="card_number" value="{{$appointment->card_number}}" disabled>
                            </div>
                        </div>
                    @endif

                    @if(($appointment->visitor_photo) && ($appointment->visitor_photo != ''))
                        <div class="col-md-4 col-sm-6 col-xsm-12">
                            <div>
                                <label for="visitor_photo" class="form-label">Visitor Photo</label>
                                <img style="max-height: 100px; max-width:150px;" class="img-thumbnail" src="{{asset('appointmentImages')}}/{{$appointment->visitor_photo ?? ''}}" alt="Visitor Photo">
                            </div>
                        </div>
                    @endif

                    {{-- @can('update_appointment_status') --}}
                        <div class="col-md-4 col-sm-6 col-xsm-12">
                            <div>
                                <label for="last_name" class="form-label">Appointment Status</label>
                                @if ($appointment->appointment_status == 0)
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateAppointmentStatus{{$appointment->id}}">Pending</button>
                                @elseif($appointment->appointment_status == 1)
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateAppointmentStatus{{$appointment->id}}">Approved</button>
                                @elseif($appointment->appointment_status == 2)
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#updateAppointmentStatus{{$appointment->id}}">Declined/Canceled</button>
                                @elseif($appointment->appointment_status == 3)
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateAppointmentStatus{{$appointment->id}}">Re-schedule</button>
                                @elseif($appointment->appointment_status == 4)
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" @if(auth()->user()->user_type != 4) data-bs-target="#updateAppointmentStatus{{$appointment->id}}" @endif>On Going</button>
                                @elseif($appointment->appointment_status == 5)
                                    <button type="button"class="btn btn-sm btn-success" data-bs-toggle="modal" @if(auth()->user()->user_type != 4) data-bs-target="#updateAppointmentStatus{{$appointment->id}}" @endif>Completed</button>
                                @endif
                            </div>
                        </div>
                    {{-- @endcan --}}

                </div><!--end row-->
            </form>

        </div>
            
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
        
    </div>

    @if (($appointment->reschedule_reason != '') || ($appointment->reschedule_reason != NULL))
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0 flex-grow-1">Re-schedule history</h4>
                <hr>
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Reason</th>
                            <th>Re-scheduled by</th>
                            <th class="text-center">Previous Date</th>
                            <th class="text-center">Previous Time</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $rescheduleDatas = json_decode($appointment->reschedule_reason,true);
                        @endphp
                        @foreach ($rescheduleDatas as $rescheduleData)
                            <tr>
                                <td class="text-center">{{$rescheduleData['index']}}</td>
                                <td>{{$rescheduleData['reason']}}</td>
                                <td>{{$appointment->userName($rescheduleData['by'])}}</td>
                                <td class="text-center">{{date('d/m/Y',strtotime($rescheduleData['date']))}}</td>
                                <td class="text-center">{{date('h:i a',strtotime($rescheduleData['time']))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- end tbody -->
                </table>
            </div>
        </div>    
    @endif

    @can('update_appointment_status')

        <div class="modal fade" id="updateAppointmentStatus{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Update Appointment Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.appointment.updateStatus', $appointment->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">

                                <div class="col-12">
                                    <div>
                                        <label for="appointment_status" class="form-label">Appointment Status<span style="color:red;">*</span></label>
                                        <select id="appointment_status" autocomplete="off" class="form-select" name="appointment_status" data-id={{$appointment->id}} required>
                                            <option value="">-- Select Status --</option>
                                            @if(auth()->user()->user_type != 4) <option value="0"> Pending </option> @endif
                                            @if(auth()->user()->user_type != 4) <option value="1"> Approve </option> @endif
                                            <option value="2"> Decline/Cancel </option>
                                            <option value="3"> Re-schedule </option>
                                            @if(auth()->user()->user_type != 4) <option value="4"> On Going </option> @endif
                                            @if(auth()->user()->user_type != 4) <option value="5"> Complete </option> @endif
                                        </select>

                                    </div>
                                </div>

                                <div id="cancelReasonBox" class="col-12" style="display: none">
                                    <div>
                                        <label for="cancel_reason" class="form-label">Decline/Cancel Reason<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="cancel_reason" id="cancel_reason" placeholder="Please type appointment re-schedule reason">
                                    </div>
                                </div>

                                <div class="col-12 rescheduleReasonBox" style="display: none">
                                    <div>
                                        <label for="reschedule_reason" class="form-label">Re-schedule Reason<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="reschedule_reason" id="reschedule_reason" placeholder="Please type appointment re-schedule reason">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 rescheduleReasonBox" style="display: none">
                                    <div>
                                        <label for="appointment_date" class="form-label">Appointment Date<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" name="appointment_date" id="appointment_date" placeholder="Appointment Date" value="{{old('appointment_date')}}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 rescheduleReasonBox" style="display: none">
                                    <div>
                                        <label for="appointment_time" class="form-label">Appointment Time<span style="color:red;">*</span></label>
                                        <input type="time" class="form-control" name="appointment_time" id="appointment_time" placeholder="Appointment Time" value="{{old('appointment_time')}}">
                                    </div>
                                </div>
                                
                                <div class="col-12 card_number_box" style="display: none">
                                    <div>
                                        <label for="card_number_box" class="form-label">Card Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="card_number" id="card_number" placeholder="Card Number" value="{{old('card_number')}}">
                                    </div>
                                </div>

                                <div id="camera" style="display: none"></div>
                                <a onclick="take_snapshot()" id="camera_button" class="btn btn-success btn-sm" style="display: none">Take Picture</a>

                                <input type="hidden" name="visitor_photo" id="visitor_photo">

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

    @endcan


@endsection

@push('script')
    <script>
        $("#appointment_status").change(function(){
            let selectedValue = $(this).val();
            let appointment_id = $(this).attr("data-id");

            if (selectedValue == "2") {
                $(".rescheduleReasonBox").css("display", "none");
                $("#reschedule_reason").attr("required", false);
                $("#appointment_time").attr("required", false);
                $("#appointment_date").attr("required", false);

                $("#cancelReasonBox").css("display", "block");
                $("#cancel_reason").attr("required", true);
                $(".card_number_box").css("display", "none");
                $("#card_number").attr("required", false);
                $("#camera").css("display", "none");
                $("#camera_button").css("display", "none");
            }else if (selectedValue == "3") {
                $("#cancelReasonBox").css("display", "none");
                $("#cancel_reason").attr("required", false);

                $(".rescheduleReasonBox").css("display", "block");
                $("#reschedule_reason").attr("required", true);
                $("#appointment_time").attr("required", true);
                $("#appointment_date").attr("required", true);
                $(".card_number_box").css("display", "none");
                $("#card_number").attr("required", false);

                $("#camera").css("display", "none");
                $("#camera_button").css("display", "none");

            }else if (selectedValue == "4") {

                $("#cancelReasonBox").css("display", "none");
                $("#cancel_reason").attr("required", false);

                $(".rescheduleReasonBox").css("display", "none");
                $("#reschedule_reason").attr("required", false);

                $("#appointment_time").attr("required", false);
                $("#appointment_date").attr("required", false);
                $(".card_number_box").css("display", "block");
                $("#card_number").attr("required", true);

                $("#camera").css("display", "block");
                $("#camera_button").css("display", "block");

                Webcam.set({
                    width:200,
                    height:150,
                    image_format:'jpeg',
                    jpeg_quality:90
                });
                Webcam.attach("#camera")

            }else{
                $("#cancelReasonBox").css("display", "none");
                $("#cancel_reason").attr("required", false);

                $(".rescheduleReasonBox").css("display", "none");
                $("#reschedule_reason").attr("required", false);

                $("#appointment_time").attr("required", false);
                $("#appointment_date").attr("required", false);
                $(".card_number_box").css("display", "none");
                $("#card_number").attr("required", false);

                $("#camera").css("display", "none");
                $("#camera_button").css("display", "none");
            }

                
        });

        function take_snapshot(){
            Webcam.snap(function(data_uri){
                document.getElementById('camera').innerHTML = '<img src="'+data_uri+'"/>';
                document.getElementById('visitor_photo').value = data_uri;
            });
        }
    </script>
@endpush
