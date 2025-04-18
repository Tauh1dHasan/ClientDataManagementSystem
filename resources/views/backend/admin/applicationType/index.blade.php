@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Application Types</li>
            </ul>
            <h1 class="page-header mb-0">Application Types</h1>
        </div>
        <div class="ms-auto">
            <button data-toggle="modal" data-target="#applicationType" title="Note" class="btn btn-outline-warning">
                <i class="fa fa-plus-circle fa-fw me-1"></i> New Application Type
            </button>
            <button data-toggle="modal" data-target="#application" title="Note" class="btn btn-outline-success">
                <i class="fa fa-plus-circle fa-fw me-1"></i> New Application
            </button>
        </div>
    </div>
    <hr>
    
      <div class="card">
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="allTab">


                <div class="table-responsive">
                    <table class="table table-separate table-head-custom table-checkable dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">SN</th>
                                <th>Application Type Name</th>
                                <th>Application Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($applicationTypes->count() > 0)
                                @php
                                    // $i = (($applicationTypes->currentPage() - 1) * $applicationTypes->perPage() + 1);
                                    $i = 1;
                                @endphp
                                @foreach ($applicationTypes as $type)
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td style="font-size: 1.1em;">{{ $type->name }}</td>
                                    <td>
                                        @foreach($type->applications as $application)
                                            <span style="font-size: 1.1em;">{{ $application->name }}</span> <br>
                                        @endforeach
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            @else
                                <tr class="odd"><td valign="top" colspan="100%" class="dataTables_empty text-center">No matching records found</td></tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <div class="card-arrow">
            <div class="card-arrow-top-left"></div>
            <div class="card-arrow-top-right"></div>
            <div class="card-arrow-bottom-left"></div>
            <div class="card-arrow-bottom-right"></div>
        </div>
    </div>



    {{-- Add application type Modal --}}

    <div id="applicationType" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header py-5">
                    <h5 class="modal-title">Add New Application Type Name
                        <span class="d-block text-muted font-size-sm"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="fas fa-close"></i>
                    </button>
                </div>
                <form class="form" action="{{ route('admin.applicationType.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="applicationTypeName">Application Type Name <span style="color:red;">*</span></label>
                                <input class="form-control" type="text" id="applicationTypeName" name="applicationTypeName" required/>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Add application Modal --}}

    <div id="application" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header py-5">
                    <h5 class="modal-title">Add New Application Name
                        <span class="d-block text-muted font-size-sm"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="fas fa-close"></i>
                    </button>
                </div>
                <form class="form" action="{{ route('admin.applicationType.applicationStore') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="applicationTypeId">Select Application Type<span style="color:red;">*</span></label>
                                <select class="form-control" id="applicationTypeId" name="applicationTypeId" required>
                                    <option value="" style="color:black;">--Select Application Type--</option>
                                    @foreach($applicationTypes as $type)
                                        <option value="{{ $type->id }}" style="color:black;">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="applicationName">Application Name <span style="color:red;">*</span></label>
                                <input class="form-control" type="text" id="applicationName" name="applicationName" required/>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection

@push('script')
    {{-- <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.clientInfo.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Client Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script> --}}
@endpush
