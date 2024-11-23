@extends('backend.layouts.app')
@section('content')
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                <li class="breadcrumb-item active">Give Permission</li>
            </ul>
            <h1 class="page-header mb-0">Give Permission</h1>
        </div>
        <div class="ms-auto">
            <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
        </div>
    </div>
    <hr>
    
      <div class="card">
        <div class="tab-content p-4">
            <div class="row">
                <div class="col-xxl-2 form-group">
                    <label for="role">Select Role:</label>
                    <select class="form-select" name="roleId" id="role">
                        @if ($selected_role != '')
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($selected_role->id == $role->id) selected @endif>{{$role->display_name}}</option>
                            @endforeach
                        @else
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-xxl-10">

                    @include('backend.admin.rolePermission.ajax.formBody')

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
@endsection

@push('script')
    <script>

        $(document).ready(function(){
            $("#role").change(function() {
                let roleId = this.value;
                showPermissions(roleId);
            });


            function showPermissions(roleId){
                let url = "{{route('admin.rolePermission.showPermission', ':roleId')}}";
                url = url.replace(':roleId', roleId);

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function(response) {
                        $("#assignedPermissionList").empty();
                        $.each(response.rolePermissions, function (key, item) {
                            if (item.permission_name) {
                                var name = item.permission_name.name_en;
                            } else {
                                var name = '-';
                            }

                            $("#assignedPermissionList").append('<div class="bg-soft-success m-1 p-2 col-xxl-2" style="border:1px solid rgba(0, 0, 0, 0.319);">\
                                    <input type="hidden" name="hiddenRoleId" value="'+item.role_id+'">\
                                    <input class="assignedPermissions" type="checkbox" name="removePermission[]" id="removePermission'+item.permission_id+'" value="'+item.permission_id+'">\
                                    <label class="form-check-label" for="removePermission'+item.permission_id+'">'+name+'</label>\
                                </div>');

                        });


                        $("#unassignedPermissionList").empty();

                        $.each(response.unassignedPermissions, function (key, item) {
                            $("#unassignedPermissionList").append('<div class="bg-soft-danger m-1 p-2 col-xxl-2" style="border:1px solid rgba(0, 0, 0, 0.319);">\
                                <input type="hidden" name="hiddenRoleId" value="'+roleId+'">\
                                <input class="unassignedPermissions" type="checkbox" name="givePermission[]" id="givePermission'+item.id+'" value="'+item.id+'">\
                                <label class="form-check-label" for="givePermission'+item.id+'">'+item.name_en+'</label>\
                            </div> ');

                        });
                    }
                });
            }
        });
    </script>

    <script>
        // select, remove all assigned permissions
        $("#selectAllAssigned").click(function(){
            $(".assignedPermissions").prop('checked', true);
        });
        $("#removeAllAssigned").click(function(){
            $(".assignedPermissions").prop('checked', false);
        });

        // select, remove all unassigned permissions
        $("#selectAllUnassigned").click(function(){
            $(".unassignedPermissions").prop('checked', true);
        });
        $("#removeAllUnassigned").click(function(){
            $(".unassignedPermissions").prop('checked', false);
        });
    </script>
@endpush
