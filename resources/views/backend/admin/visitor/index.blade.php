@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Visitor List</li>
            </ul>
            <h1 class="page-header mb-0">Visitor List</h1>
        </div>
        <div class="ms-auto">
            <a href="{{route('admin.visitor.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add New Visitor</a>
        </div>
    </div>
    <hr>
    <form action="" method="get">
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
    </form>
    
      <div class="card">
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="allTab">


                <div class="table-responsive">
                    <table class="table table-separate table-head-custom table-checkable dataTable">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Image</th>
                                <th>Visitor Name</th>
                                <th class="text-center">Mobile</th>
                                <th>Email</th>
                                <th>Organization</th>
                                <th>Designation</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($visitors->count() > 0)
                                @php
                                    $i = (($visitors->currentPage() - 1) * $visitors->perPage() + 1);
                                @endphp
                                @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="text-center"> 
                                        @if ($visitor->image)
                                            <img src="{{ asset('storage/userImages/' . $visitor->image) }}" alt="Photo" style="max-width: 80px;">
                                        @else
                                            <img src="{{ asset('assets/media/users/blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                                        @endif
                                    </td>
                                    <td>{{ucfirst($visitor->user->name_en)}}</td>
                                    <td align="middle">{{$visitor->user->mobile ?? 'N/A' }}</td>
                                    <td>{{$visitor->user->email ?? 'N/A' }}</td>
                                    <td>{{$visitor->visitor_organization ?? 'N/A'}}</td>
                                    <td>{{$visitor->visitor_designation ?? 'N/A'}}</td>
                                    <td>
                                        @if ($visitor->user->status == 1)
                                            <span class="btn btn-outline-success">Active</span>
                                        @else
                                            <span class="btn btn-outline-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('view_visitor')
                                            <a href="{{route('admin.visitor.show', $visitor->id)}}" class="btn btn-outline-light" title="view">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('edit_visitor')
                                            <a href="{{route('admin.visitor.edit', $visitor->id)}}" class="btn btn-outline-warning" title="Edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                                        @can('delete_visitor')
                                            <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $visitor->id }}">
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
                                <tr class="odd"><td valign="top" colspan="11" class="dataTables_empty">No matching records found</td></tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
                {{$visitors->appends($_GET)->links()}}
                
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
