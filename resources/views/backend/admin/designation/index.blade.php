@extends('backend.layouts.app')

@section('content')
    <div id="content" class="app-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('alerts.alerts')
                        
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                                <li class="breadcrumb-item active">All Designations</li>
                            </ul>

                            <h1 class="page-header mb-0">All Designations</h1>
                        </div>

                        <div class="ms-auto">
                            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
                            @can('add_designation')
                                <button data-toggle="modal" data-target="#addDesignation" class="btn btn-outline-theme">
                                    <i class="fa fa-plus-circle fa-fw me-1"></i> Add Designation
                                </button>
                            @endcan
                        </div>
                    </div>

                    <hr>

                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="search_text">Find Designation</label>

                                    <input type="text" name="search_text" class="form-control" id="search_text" placeholder="Search by Designation Name (English or Bangla)">
                                </div>
                            </div>
                                
                            <div class="col-md-1">
                                <div class="d-flex" style="margin-top: 28px;">
                                    <div class="mr-2" style="margin-right: 10px;">
                                        <button type="submit" class="btn btn-success">Find</button>
                                    </div>

                                    <div>
                                        <a href="{{ route('admin.designation.index') }}" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-n3">
                                <div class="col-xl-12">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Designation Name (English)</th>
                                                <th scope="col">Designation Name (Bangla)</th>
                                                <th scope="col" style="text-align: center">Status</th>
                                                <th scope="col" style="text-align: center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($designations->count() > 0)
                                                @php
                                                    $i = (($designations->currentPage() - 1) * $designations->perPage() + 1);
                                                @endphp

                                                @foreach ($designations as $designation)
                                                    <tr>
                                                        <th scope="row">{{ $i }}</th>

                                                        <td>{{ $designation->name_en }}</td>
                                                        <td>{{ $designation->name_bn }}</td>

                                                        <td style="text-align: center">
                                                            @if ($designation->status == 1)
                                                                <span class="badge bg-transparent border border-success text-theme fs-12px fw-500 rounded-sm">Active</span>
                                                            @elseif ($designation->status == 0)
                                                                <span class="badge bg-transparent border border-danger text-danger fs-12px fw-500 rounded-sm">Inactive</span>
                                                            @endif
                                                        </td>

                                                        <td style="text-align: center">
                                                            {{-- @can('show_designation') --}}
                                                                <a href="{{route('admin.designation.show', $designation->id)}}" class="btn btn-outline-yellow" title="view">
                                                                    <i class="fa-solid fa-eye"></i>
                                                                </a>
                                                            {{-- @endcan --}}

                                                            @can('edit_designation')
                                                                <a href="{{route('admin.designation.edit', $designation->id)}}" class="btn btn-outline-primary" title="Edit">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </a>
                                                            @endcan

                                                            @can('delete_designation')
                                                                <button type="button" class="btn btn-outline-danger delete" data-id="{{ $designation->id }}" title="Delete">
                                                                    <i class="fas fa-fw fa-trash-alt"></i>
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

                                    {{ $designations->links() }}
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
                </div>
            </div>
        </div>

        {{-- Add new Designation Modal --}}
        @can('add_designation')
            <div id="addDesignation" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header py-5">
                            <h5 class="modal-title">Add New Designation
                                <span class="d-block text-muted font-size-sm"></span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="fas fa-close"></i>
                            </button>
                        </div>
                        <form class="form" action="{{ route('admin.designation.store') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Designation (English): <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_en" placeholder="Enter Designation in English" value="{{ old('name') }}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Designation (Bangla): <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_bn" placeholder="ডেসিগন্যাশন বাংলায় লিখুন" value="{{ old('name') }}" required />
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
        $('.delete').on('click', function() {
            let data_id = $(this).attr("data-id");
            let url =  '<a href="{{ route("admin.designation.destroy", ":id") }}" class="swal2-confirm swal2-styled text-white" title="Delete" style="text-decoration: none;">Confirm</a>';

            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure want to delete?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Designation Deleted Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });
    </script>
@endpush

