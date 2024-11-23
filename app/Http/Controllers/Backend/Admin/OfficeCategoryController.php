<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\OfficeCategory;

class OfficeCategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('offie_category', $user)){
            menuSubmenu('manage_office', 'offie_category');
            if($request->name != ''){
                $officeCats = OfficeCategory::where('name_en', 'like', '%'.$request->name.'%')->paginate(20);
            }else{
                $officeCats = OfficeCategory::latest()->paginate(20);
            }
            return view('backend.admin.officeCategory.index', compact('officeCats'));
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_office_category', $user)){

            $request->validate([
                'name' => 'required',
            ]);

            $officeCat = new OfficeCategory;
            $officeCat->name_en = $request->name;
            $officeCat->status = 1;
            $officeCat->created_by = $user->id;
            $officeCat->save();

            return redirect()->route('admin.officeCategory.index')->with('success', 'New Office Category added successfully..!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function edit($id) 
    {
        $user = Auth::user();
        if(Gate::allows('edit_office_category', $user)){
            $officeCat = OfficeCategory::where('id', $id)->first();
            return view('backend.admin.officeCategory.edit', compact('officeCat'));
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_office_category', $user)){
            
            $request->validate([
                'name' => 'required',
            ]);

            $officeCat = OfficeCategory::where('id', $id)->first();
            $officeCat->name_en = $request->name;
            $officeCat->status = $request->status ?? 0;
            $officeCat->updated_by = $user->id;
            $officeCat->save();

            return redirect()->route('admin.officeCategory.index')->with('success', 'Office Category updated successfully..!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function delete($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_office_category', $user)){
            $officeCat = OfficeCategory::where('id', $id)->first();
            $officeCat->delete();
            return redirect()->route('admin.officeCategory.index')->with('success', 'Office Category deleted successfully..!');
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

}
