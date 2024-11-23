@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Client List</li>
            </ul>
            <h1 class="page-header mb-0">Client List</h1>
        </div>
        <div class="ms-auto">
            <a href="{{route('admin.clientInfo.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add New Client</a>
        </div>
    </div>
    <hr>
    <form action="" method="get">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">Search Client</label>
                    <input @if(isset($_GET['name']) && $_GET['name'] != '') value="{{$_GET['name']}}" @endif type="text" name="name" class="form-control" id="name" placeholder="Client Name/Mobile/Email/NID">
                </div>
            </div>

            {{-- <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="visitor_status">Status</label>
                    <select class="form-select" id="visitor_status" name="visitor_status">
                        <option value="">--Search By Status--</option>
                        <option @if(isset($_GET['visitor_status']) && $_GET['visitor_status'] != 1) selected @endif value="0">Pending</option>
                        <option @if(isset($_GET['visitor_status']) && $_GET['visitor_status'] == 1) selected @endif value="1">Approved</option>
                    </select>
                </div>
            </div> --}}
                
            <div class="col-md-1">
                <div class="d-flex" style="margin-top: 28px;">
                    <div class="mr-2" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-success mb-1">Filter</button>
                    </div>
                    <div>
                        <a href="{{route('admin.clientInfo.index')}}" class="btn btn-danger mb-1">Reset</a>
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
                                <th class="text-center">No</th>
                                <th class="text-center">Photo</th>
                                <th>Client Name</th>
                                <th class="text-center">Mobile</th>
                                <th>Email</th>
                                <th>NID</th>
                                <th>Address</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($clientInfos->count() > 0)
                                @php
                                    $i = (($clientInfos->currentPage() - 1) * $clientInfos->perPage() + 1);
                                @endphp
                                @foreach ($clientInfos as $clientInfo)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="text-center"> 
                                        @if ($clientInfo->photo)
                                            <img src="{{ asset('storage/clientImages/' . $clientInfo->photo) }}" alt="Photo" style="max-width: 80px;">
                                        @else
                                            <img src="{{ asset('blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                                        @endif
                                    </td>
                                    <td>{{ucfirst($clientInfo->name)}}</td>
                                    <td align="middle">{{$clientInfo->mobile ?? 'N/A' }}</td>
                                    <td>{{$clientInfo->email ?? 'N/A' }}</td>
                                    <td>{{$clientInfo->nid ?? 'N/A'}}</td>
                                    <td>{{$clientInfo->address ?? 'N/A'}}</td>
                                    <td>{{$clientInfo->notes ?? 'N/A'}}</td>
                                    
                                    <td>

                                        <a href="{{route('admin.clientInfo.show', $clientInfo->id)}}" class="btn btn-outline-light" title="view">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                    
                                        <a href="{{route('admin.clientInfo.edit', $clientInfo->id)}}" class="btn btn-outline-warning" title="Edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    
                                    
                                        {{-- <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $clientInfo->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button> --}}
                                        
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
                {{$clientInfos->appends($_GET)->links()}}
                
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
            var url =  '<a href="{{route("admin.clientInfo.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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
