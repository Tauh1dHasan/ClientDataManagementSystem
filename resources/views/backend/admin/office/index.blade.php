@extends('backend.layouts.app')
@section('content')
    <div id="content" class="app-content">
        @include('alerts.alerts')
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD </a> </li>
                    <li class="breadcrumb-item">Office List</li>
                </ul>
                <h1 class="page-header mb-0">Office List</h1>
            </div>
            <div class="ms-auto">
                @can('add_office')
                    <button data-toggle="modal" data-target="#addOffice" class="btn btn-outline-theme">
                        <i class="fa fa-plus-circle fa-fw me-1"></i> Add Office
                    </button>
                @endcan
            </div>
        </div>
        <hr>
        <form action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Office Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Office Name">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-flex" style="margin-top: 25px;">
                        <div class="mr-2" style="margin-right: 10px;">
                            {{-- <label class="form-label"></label> <br> --}}
                            <button type="submit" class="btn btn-outline-green btn-success mt-1 text-white">Filter</button>
                        </div>
                        <div>
                            {{-- <label class="form-label"></label> <br> --}}
                            <a href="{{ route('admin.office.index') }}" class="btn btn-outline-warning btn-warning mt-1 text-white">Reset</a>
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
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th class="text-left">Office Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-left">Created by</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($offices->count() > 0)
                                    @php
                                        $i = ($offices->currentPage() - 1) * $offices->perPage() + 1;
                                    @endphp
                                    @foreach ($offices as $office)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td align="left">{{ ucfirst($office->name) }}</td>
                                            <td align="middle">
                                                @if ($office->status == 1)
                                                    <i style="color: green;" class="fas fa-lg fa-fw me-2 fa-check"></i>
                                                @else                                                    
                                                    <i style="color: red;" class="fas fa-lg fa-fw me-2 fa-times"></i>
                                                @endif
                                            </td>
                                            <td align="left">{{ $office->createdBy->name_en ?? 'N/A'}}</td>
                                            <td align="middle">
                                                @can('edit_office')
                                                    {{-- <button data-toggle="modal" data-target="#editDepartment{{$department->id}}" class="btn btn-outline-warning" title="Edit">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button> --}}
                                                    <a class="btn btn-outline-warning" href="{{route('admin.office.edit', $office->id)}}" title="Edit">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                @endcan
                                                @can('delete_office')
                                                    <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $office->id }}">
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
                                    <tr class="odd">
                                        <td valign="top" colspan="100%" class="text-center">No matching records found</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    {{ $offices->links() }}

                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>

        {{-- Add new Department Modal --}}
        @can('add_office')
            <div id="addOffice" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header py-5">
                            <h5 class="modal-title">Add New Office
                                <span class="d-block text-muted font-size-sm"></span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="fas fa-close"></i>
                            </button>
                        </div>
                        <form class="form" action="{{ route('admin.office.store') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Office Name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Office Name" value="{{ old('name') }}" required />
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
        @endcan


    </div>
@endsection


@push('script')
    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.office.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Office Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush