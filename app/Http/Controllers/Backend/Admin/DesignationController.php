<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        menuSubmenu('manage_office', 'manage_office_submenu');

        if(Gate::allows('all_designations', $user))
        {
            $query = Designation::where('status', '!=', 2);

            if ($request->search_text && $request->search_text != '') {
                $query->where(function($query) use($request){
                    $query->where('name_en', 'like', '%'.$request->search_text.'%')
                          ->orWhere('name_bn', 'like', '%'.$request->search_text.'%');
                });
            }

            $designations = $query->latest()->paginate(25);

            return view('backend.admin.designation.index', compact('designations'));
        }
        else
        {
            return abort(403, "You don't have permission..!");
        }
    }

    public function create()
    {
        menuSubmenu('manage_office', 'manage_office_submenu');

        $user = Auth::user();

        if (Gate::allows('add_designation', $user)) 
        {
            return view('backend.admin.designation.create');
        }
        else
        {
            return abort(403, "You don't have permission..!");
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en'   => 'required',
            'name_bn'   => 'required',
        ]);

        $designation = new Designation;

        $designation->name_en       = $request->name_en;
        $designation->name_bn       = $request->name_bn;
        $designation->created_by    = Auth::id();
        $designation->status        = 1;
       
        $designation->save();

        return redirect()->route('admin.designation.index')->with('success', 'Designation Created Successfully!');
    }

    public function show(Designation $designation)
    {
        $user = Auth::user();
        if (Gate::allows('manage_office', $user)) {
            
            if(Gate::allows('all_designations', $user)){

                menuSubmenu('manage_office', 'all_designations');
                return view('backend.admin.designation.show', compact('designation'));

            }else{
                
                return abort(403, "You don't have permission..!");

            }

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function edit(Designation $designation)
    {
        $user = Auth::user();
        menuSubmenu('manage_office', 'manage_office_submenu');
        if (Gate::allows('edit_designation', $user)) 
        {
            return view('backend.admin.designation.edit', compact('designation'));
        }
        else
        {
            return abort(403, "You don't have permission..!");
        }
    }

    public function update(Request $request, Designation $designation)
    {
        $request->validate([
            'name_en'   => 'required',
            'name_bn'   => 'required',
        ]);

        $designation->name_en       = $request->name_en;
        $designation->name_bn       = $request->name_bn;
        $designation->updated_by    = Auth::id();
        $designation->status        = $request->status;
       
        $designation->save();

        return redirect()->route('admin.designation.index')->with('success', 'Designation Created Successfully!');
    }

    public function destroy(Designation $designation)
    {
        $user = Auth::user();

        if (Gate::allows('delete_designation', $user)) 
        {
            $designation->status = 2;

            $designation->save();

            return back()->with('success', 'Designation Deleted Successfully!');
        }
        else
        {
            return abort(403, "You don't have permission..!");
        }
    }
}
