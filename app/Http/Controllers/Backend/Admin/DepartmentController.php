<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('all_departments', $user)){

            menuSubmenu('manage_office', 'all_departments');

            if(($request->name != '') && ($request->name != NULL)){
                $departments = Department::where('name', 'like', '%'.$request->name.'%')->paginate(20);
            }else{
                $departments = Department::latest()->paginate(20);
            }

            return view('backend.admin.department.index', compact('departments'));

        }else{
            return abort(403, "You don't have permission..!");
        }   
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('all_departments', $user)){

            $request->validate([
                'name' => 'required',
            ]);

            $department = new Department;
            $department->name = $request->name;
            $department->status = 1;
            $department->created_by = $user->id;
            $department->save();
            
            return redirect()->route('admin.department.index')->with('success', 'New Department added successfully..!');

        }else{
            return abort(403, "You don't have permission..!");
        }   
    }

    public function edit($id)
    {
        $user = Auth::user();
        if(Gate::allows('all_departments', $user)){
            menuSubmenu('manage_office', 'all_departments');

            $department = Department::where('id', $id)->first();
            return view('backend.admin.department.edit', compact('department'));

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_department')) {
            
            $request->validate([
                'name' => 'required',
            ]);

            $department = Department::where('id', $id)->first();
            $department->name = $request->name;
            $department->status = $request->status ?? 0;
            $department->save();

            return redirect()->route('admin.department.index')->with('success', 'Department Updated successfully..!');
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_department')) {
            $department = Department::where('id', $id)->first();
            
            $department->delete();

            return redirect()->route('admin.department.index')->with('success', 'Department Deleted successfully..!');
        }else{
            return abort(403, "You don't have permission..!");
        }
    }


}
