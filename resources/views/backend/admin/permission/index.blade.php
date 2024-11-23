@extends('backend.layouts.app')
@section('content')
    <div id="content" class="app-content">
        @include('alerts.alerts')
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD </a> </li>
                    <li>Permission List</li>
                </ul>
                <h1 class="page-header mb-0">Permission List</h1>
            </div>
            <div class="ms-auto">
                @can('add_permission')
                    <button data-toggle="modal" data-target="#addPermission" class="btn btn-outline-theme">
                        <i class="fa fa-plus-circle fa-fw me-1"></i> Add Permission
                    </button>
                @endcan
            </div>
        </div>
        <hr>
        <form action="" method="get">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Permission Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Permission Name">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="d-flex" style="margin-top: 25px;">
                        <div class="mr-2" style="margin-right: 10px;">
                            {{-- <label class="form-label">&nbsp;</label> <br> --}}
                            <button type="submit" class="btn btn-outline-green btn-success mb-1 text-white">Search</button>
                        </div>
                        <div>
                            {{-- <label class="form-label">&nbsp;</label> <br> --}}
                            <a href="{{ route('admin.permission.index') }}"
                                class="btn btn-outline-warning btn-warning mb-1 text-white">Reset</a>
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
                                    <th>#</th>
                                    <th class="text-left">PERMISION NAME</th>
                                    <th>CREATED BY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($permissions->count() > 0)
                                    @php
                                        $i = ($permissions->currentPage() - 1) * $permissions->perPage() + 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td align="left">{{ ucfirst($permission->name_en) }}</td>
                                            <td align="left">{{ $permission->user ? ucfirst($permission->user->name_en) : '' }}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr class="odd">
                                        <td valign="top" colspan="11" class="dataTables_empty">No matching records found
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    {{ $permissions->links() }}

                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>

        {{-- Add new permission Modal --}}
        @can('add_permission')
            <div id="addPermission" class="modal fade" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header py-5">
                            <h5 class="modal-title">Add Permission
                                <span class="d-block text-muted font-size-sm"></span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="fas fa-close"></i>
                            </button>
                        </div>
                        <form class="form" action="{{ route('admin.permission.create') }}" method="post">
                            <div class="modal-body">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>PERMISION NAME: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name_en"
                                            placeholder="Enter permission name" value="{{ old('name_en') }}" required />
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
