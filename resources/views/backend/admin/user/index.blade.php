@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    @include('alerts.alerts')
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">User List</li>
            </ul>
            <h1 class="page-header mb-0">User List</h1>
        </div>
        <div class="ms-auto">
            <a href="{{route('admin.user.create')}}" class="btn btn-outline-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> Add User</a>
        </div>
    </div>
    <hr>
    <form action="" method="get">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="name">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="User Name">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group mb-3">
                    <label class="form-label" for="role_id">Role</label>
                    <select class="form-select" id="role_id" name="role_id">
                        <option value="">--Search By Role--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-1">
                <div class="d-flex" style="margin-top: 25px;">
                    <div class="mr-2" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-success mb-1">Filter</button>
                    </div>
                    <div>
                        <a href="{{route('admin.user.index')}}" class="btn btn-danger mb-1">Reset</a>
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
                                <th>#</th>
                                {{-- <th class="d-none">Photo</th> --}}
                                <th class="text-left">Name</th>
                                <th class="text-left">Role</th>
                                <th class="text-left">Designation</th>
                                <th>Mobile</th>
                                <th class="text-left">Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                                @php
                                    $i = (($users->currentPage() - 1) * $users->perPage() + 1);
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$i}}</td>
                                    {{-- <td class="d-none"> 
                                        @if ($user->photo)
                                            <img src="{{ asset('storage/users/' . $user->photo) }}" alt="Photo" style="max-width: 80px;">
                                        @else
                                            <img src="{{ asset('assets/media/users/blank.png') }}" alt="Photo" style="max-width: 80px;"> 
                                        @endif
                                        
                                    </td> --}}
                                    <td align="left">{{ucfirst($user->name_en)}}</td>
                                    <td align="left">{{$user->role ? $user->role->name_en : 'N/A' }}</td>
                                    <td align="left">{{$user->userInfo->designation->name_en ?? 'N/A' }}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td align="left">{{$user->email}}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="btn btn-outline-success">Active</span>
                                        @elseif ($user->status == 0)
                                            <span class="btn btn-outline-warning">Blocked</span>
                                        @elseif ($user->status == 2)
                                            <span class="btn btn-outline-danger">Deleted</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('view_user')
                                            
                                            <a href="{{route('admin.user.show', $user->id)}}" class="btn btn-outline-light" title="view">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('edit_user')
                    
                                            <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-outline-warning" title="Edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        @endcan
                                        @can('block_user')
                    
                                            @if ($user->status == 1)
                                                <button class="btn btn-outline-danger block" title="Block" data-id="{{ $user->id }}">
                                                    <i class="fa-solid fa-ban"></i>
                                                </button>
                                            @elseif ($user->status == 0)
                                                <button class="btn btn-outline-success block" title="Unblock" data-id="{{ $user->id }}">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            @endif
                                        @endcan
                    
                                        @can('delete_user')
                                            @if ($user->status == 1 || $user->status == 0)
                                                <button class="btn btn-outline-danger delete" title="Delete" data-id="{{ $user->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            @elseif ($user->status == 2)
                                                <button class="btn btn-outline-success delete" title="Restore" data-id="{{ $user->id }}">
                                                    <i class="fas fa-angle-double-up"></i>
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
                {{ $users->links() }}
                
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
        $(".block").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.user.block",":id")}}" class="swal2-confirm swal2-styled" title="Block">Confirm</a>';
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

    <script> 
        $(".delete").click(function(e) {

            var data_id = $(this).attr("data-id");
            var url =  '<a href="{{route("admin.user.delete",":id")}}" class="swal2-confirm swal2-styled" title="Delete">Confirm</a>';
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
