@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Role List</li>
            </ul>
            <h1 class="page-header mb-0">Role List</h1>
        </div>
        <div class="ms-auto">
            @can('add_role')
                <a href="{{route('admin.role.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add New Role</a>
            @endcan
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
                                <th>#</th>
                                <th class="text-left">Role Name (Bangla)</th>
                                <th class="text-left">Role Name (English)</th>
                                <th class="text-left">Display Name</th>
                                <th class="text-left">Created By</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->count() > 0)
                                @php
                                    $i = (($roles->currentPage() - 1) * $roles->perPage() + 1);
                                @endphp
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td align="left">{{$role->name_bn}}</td>
                                    <td align="left">{{ucfirst($role->name_en)}}</td>
                                    <td align="left">{{ucfirst($role->display_name)}}</td>
                                    <td align="left">{{$role->user ? ucfirst($role->user->username) : 'N/A'}}</td>
                                    <td>
                                        @if ($role->status == 1)
                                            <span class="btn btn-outline-success">Active</span>
                                        @else
                                            <span class="btn btn-outline-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit_role')
                                            <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-outline-warning" title="Edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                    
                                        @can('delete_role')
                                            @if ($role->status == 1)
                                                <button class="btn btn-outline-danger delete" title="Inactive" data-id="{{ $role->id }}">
                                                    <i class="fa-solid fa-ban"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-outline-success delete" title="Active" data-id="{{ $role->id }}">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            @endif
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
                {{ $roles->links() }}
                
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
            var url =  '<a href="{{route("admin.role.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
            url = url.replace(':id', data_id );
            
            Swal.fire({
                title: 'Are you sure ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: url,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Status Changed Successfully!', '', 'success')
                } else if (result.dismiss === "cancel") {
                    Swal.fire('Canceled', '', 'error')
                }
            })
        });

    </script>
@endpush
