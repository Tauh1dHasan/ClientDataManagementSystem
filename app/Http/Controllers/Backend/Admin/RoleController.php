<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Auth;
use Validator;

use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user)){
            if(Gate::allows('all_roles', $user)){

                menuSubmenu('roles','allRoles');
        
                $query = Role::latest();
                if(Auth::user()->role_id != 1){
                    $query = $query->where('id','!=',1);
                }
                $roles = $query->paginate(25);

                return view('backend.admin.role.index',[
                    'roles' => $roles
                ]);

            }else{
                abort(403, "You don't have permission..!");    
            }
        }else{
            abort(403, "You don't have permission..!");
        }
    }


    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user)){
            if(Gate::allows('add_role', $user)){

                menuSubmenu('roles', 'allRoles');
                return view('backend.admin.role.create');

            }else{
                abort(403, "You don't have permission..!");
            }
        }else{
            abort(403, "You don't have permission..!");
        }
    }


    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'role_name_bn' => ['required', 'string', 'max:255','min:3'],
            'role_name_en' => ['required', 'string', 'max:255','min:3'],
            'display_name' => ['required']
        ]);

        $role = new Role;

        $role->name_en = $request->role_name_en;
        $role->name_bn = $request->role_name_bn;
        $role->status = true;
        // $role->ordering = 1;
        $role->created_by = Auth::id();
        $role->display_name = $request->display_name;
        $role->save();

        return redirect()->route('admin.role.index')->with('success', 'Role Created Successfully..!');
    }


    public function edit($id)
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user)){
            if(Gate::allows('edit_role', $user)){

                menuSubmenu('roles', 'allRoles');
                $role = Role::find($id);
                return view('backend.admin.role.edit', compact('role'));

            }else{
                abort(403, "You don't have permission..!");
            }
        }else{
            abort(403, "You don't have permission..!");
        }
    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user)){
            if(Gate::allows('edit_role', $user)){

                $validation = Validator::make($request->all(),
                [ 
                    'role_name_bn' => ['required', 'string', 'max:255','min:3'],
                    'display_name' => ['required', 'string', 'max:255','min:3'],
                    'role_name_en' => ['required', 'string', 'max:255','min:3'],
                ]);

                $role = Role::find($id);

                $role->name_en = $request->role_name_en;
                $role->name_bn = $request->role_name_bn;
                $role->display_name = $request->display_name;
                $role->updated_by = Auth::id();
                $role->save();

                return redirect()->route('admin.role.index')->with('success', 'Role Updated Successfully..!');

            }else{
                abort(403, "You don't have permission..!");
            }
        }else{
            abort(403, "You don't have permission..!");
        }
    }

    public function delete($id)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) {

            if(Gate::allows('delete_role',$userr)) {                

                $role = Role::where('id', $id)->first();
                if ($role->status == 1) {
                    $role->status       = 0;
                    $role->updated_by   = Auth::id();
                }else{
                    $role->status       = 1;
                    $role->updated_by   = Auth::id();
                }
        
                $role->save();
        
                return redirect()->route('admin.role.index')->with('success', 'Role Status Updated Successfully..!');
                
            }else{
                abort(403, "You don't have permission..!");
            }
        }else{
            abort(403, "You don't have permission..!");
        }
    }




}
