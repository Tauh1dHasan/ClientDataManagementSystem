@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Pending Task</li>
            </ul>
            <h1 class="page-header mb-0">Pending Task</h1>
        </div>
        <div class="ms-auto">
            {{-- <a href="{{route('admin.visitor.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add New Visitor</a> --}}
        </div>
    </div>
    <hr>
    {{-- <form action="" method="get">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Visitor Name/Mobile</label>
                    <input @if(isset($_GET['name']) && $_GET['name'] != '') value="{{$_GET['name']}}" @endif type="text" name="name" class="form-control" id="name" placeholder="Visitor Name/Mobile">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="visitor_status">Status</label>
                    <select class="form-select" id="visitor_status" name="visitor_status">
                        <option value="">--Search By Status--</option>
                        <option @if(isset($_GET['visitor_status']) && $_GET['visitor_status'] != 1) selected @endif value="0">Pending</option>
                        <option @if(isset($_GET['visitor_status']) && $_GET['visitor_status'] == 1) selected @endif value="1">Approved</option>
                    </select>
                </div>
            </div>
                
            <div class="col-md-1">
                <div class="d-flex" style="margin-top: 25px;">
                    <div class="mr-2" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-success mb-1">Filter</button>
                    </div>
                    <div>
                        <a href="{{route('admin.visitor.index')}}" class="btn btn-danger mb-1">Reset</a>
                    </div>
                </div>
            </div>
                
        </div>
    </form> --}}
    
      <div class="card">
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="allTab">


                <div class="table-responsive">
                    <table class="table table-separate table-head-custom table-checkable dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th>Client Name</th>
                                <th>Task Name</th>
                                <th>Start Date</th>
                                <th>Estimated End Date</th>
                                <th>Actual End Date</th>
                                <th>Note</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pendingTasks->count() > 0)
                                {{-- @php
                                    $i = (($pendingTasks->currentPage() - 1) * $pendingTasks->perPage() + 1);
                                @endphp --}}
                                @foreach ($pendingTasks as $pendingTask)
                                <tr>
                                    
                                    
                                    <td>
                                        <a href="{{route('admin.clientInfo.show', $pendingTask->client_info_id)}}">
                                            {{ucfirst($pendingTask->clientInfo->first_name . " ")}} {{ucfirst($pendingTask->clientInfo->last_name)}}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $pendingTask->application->name ?? 'N/A' }} <br>
                                        <small class="text-muted">({{ $pendingTask->application->applicationType->name ?? 'N/A' }})</small>
                                    </td>
                                    <td>{{date('d/m/Y', strtotime($pendingTask->start_date))}}</td>
                                    <td>{{date('d/m/Y', strtotime($pendingTask->estimated_end_date))}}</td>
                                    <td>
                                        @if ($pendingTask->actual_end_date == null || $pendingTask->status == 1)
                                            <span class="text-danger">Not Completed</span>
                                        @else
                                            {{date('d/m/Y', strtotime($pendingTask->actual_end_date))}}
                                        @endif
                                    </td>
                                    <td>{{ $pendingTask->note }}</td>

                                    <td>
                                        @if ($pendingTask->status == 1)
                                            <span class="btn btn-outline-warning">In Progress</span>
                                        @else
                                            <span class="btn btn-outline-success">Completed</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                                {{-- @php
                                    $i++;
                                @endphp --}}
                                @endforeach
                            @else
                                <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                {{-- {{$pendingTasks->appends($_GET)->links()}} --}}
                
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
            var url =  '<a href="{{route("admin.visitor.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Visitor Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush
