@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Appointment List</li>
            </ul>
            <h1 class="page-header mb-0">Appointment List</h1>
        </div>
        <div class="ms-auto">
            <a href="{{route('admin.appointment.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> New Appointment</a>
        </div>
    </div>
    <hr>
    <form action="" method="get">
        <div class="row">
            
            <div class="col-md-2">
                <div class="form-group mb-3">
                    <label class="form-label" for="from">From:</label>
                    <input @if(isset($_GET['from']) && $_GET['from'] != '') value="{{$_GET['from']}}" @endif type="date" name="from" class="form-control" id="from">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group mb-3">
                    <label class="form-label" for="to">To:</label>
                    <input @if(isset($_GET['to']) && $_GET['to'] != '') value="{{$_GET['to']}}" @endif type="date" name="to" class="form-control" id="to">
                </div>
            </div>

            @if (($user->role_id != 3) && ($user->role_id != 4))
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Search</label>
                        <input @if(isset($_GET['name']) && $_GET['name'] != '') value="{{$_GET['name']}}" @endif type="text" name="name" class="form-control" id="name" placeholder="Host/Visitor's Name/Mobile">
                    </div>
                </div>
            @endif

            <div class="col-md-2">
                <div class="form-group mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">--Search By Status--</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 0) selected @endif value="0">Pending</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 1) selected @endif value="1">Approved</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 2) selected @endif value="2">Declined</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 3) selected @endif value="3">Re-Schedule</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 4) selected @endif value="4">On-Going</option>
                        <option @if(isset($_GET['status']) && $_GET['status'] == 5) selected @endif value="5">Complete</option>
                    </select>
                </div>
            </div>
                
            <div class="col-md-1">
                <div class="d-flex" style="margin-top: 25px;">
                    <div class="mr-2" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-success mb-1">Filter</button>
                    </div>
                    <div>
                        <a href="{{route('admin.appointment.index')}}" class="btn btn-danger mb-1">Reset</a>
                    </div>
                </div>
            </div>
                
        </div>
    </form>
    
      <div class="card">
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="allTab">


                <div class="table-responsive">
                    <table class="table table-separate table-head-custom table-checkable dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Host Name</th>
                                <th>Visitor Name</th>
                                <th>Organization</th>
                                <th>Designation</th>
                                <th class="text-center">Mobile</th>
                                <th>Purpose</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($appointments->count() > 0)
                                @php
                                    $i = (($appointments->currentPage() - 1) * $appointments->perPage() + 1);
                                @endphp
                                @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ucfirst($appointment->hostUser->name_en ?? 'N/A')}}</td>
                                    <td>{{ucfirst($appointment->visitorUser->name_en ?? 'N/A')}}</td>
                                    <td>{{$appointment->visitor_organization ?? 'N/A'}}</td>
                                    <td>{{$appointment->visitor_designation ?? 'N/A'}}</td>
                                    <td align="middle">{{$appointment->visitorUser->mobile ?? 'N/A' }}</td>
                                    <td>{{$appointment->appointment_purpose ?? 'N/A' }}</td>
                                    <td>{{date('D-M-Y', strtotime($appointment->appointment_date))}} {{date('h:i:s a', strtotime($appointment->appointment_time))}}</td>
                                    <td>
                                        @if ($appointment->appointment_status == 0)
                                            <a href="#" class="btn btn-outline-warning">Pending</a>
                                        @elseif($appointment->appointment_status == 1)
                                            <span class="btn btn-outline-success">Approved</span>
                                        @elseif($appointment->appointment_status == 2)
                                            <span class="btn btn-outline-danger">Declined</span>
                                        @elseif($appointment->appointment_status == 3)
                                            <span class="btn btn-outline-info">Re-Scheduled</span>
                                        @elseif($appointment->appointment_status == 4)
                                            <span class="btn btn-outline-primary">On-Going</span>
                                        @elseif($appointment->appointment_status == 5)
                                            <span class="btn btn-outline-success">Done</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('view_appointment')
                                            <a href="{{route('admin.appointment.show', Crypt::encryptString($appointment->id))}}" class="btn btn-outline-light" title="view">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('edit_appointment')
                                            <a href="{{route('admin.appointment.edit', $appointment->id)}}" class="btn btn-outline-warning" title="Edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                                        @can('delete_appointment')
                                            <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $appointment->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            @else
                                <tr class="odd"><td valign="top" colspan="100%" class="text-center">No matching records found</td></tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                {{$appointments->appends($_GET)->links()}}
                
            </div>
        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
    </div>


</div>
@endsection

@push('script')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.appointment.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Appointment Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush
