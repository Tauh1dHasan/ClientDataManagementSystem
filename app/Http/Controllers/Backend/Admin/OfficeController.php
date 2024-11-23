<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\Office;

class OfficeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_office', $user)){
            if(Gate::allows('offie_list', $user)){
                menuSubmenu('manage_office', 'offie_list');
                if($request->name != ''){
                    $offices = Office::where('name', 'like', '%'.$request->name.'%')->paginate(20);
                }else{
                    $offices = Office::latest()->paginate(20);
                }
                return view('backend.admin.office.index', compact('offices'));
            }else{
                return abort(403, "You don't have permission..!");
            }
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_office', $user)){

            $request->validate([
                'name' => 'required',
            ]);

            $office = new Office;
            $office->name = $request->name;
            $office->status = 1;
            $office->created_by = $user->id;
            $office->save();

            return redirect()->route('admin.office.index')->with('success', 'New Office added successfully..!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_office', $user)){
            $office = Office::where('id', $id)->first();
            return view('backend.admin.office.edit', compact('office'));
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_office', $user)){

            $request->validate([
                'name' => 'required',
            ]);

            $office = Office::where('id', $id)->first();
            $office->name = $request->name;
            $office->status = $request->status ?? 0;
            $office->updated_by = $user->id;
            $office->save();
            return redirect()->route('admin.office.index')->with('success', 'Office updated successfully..!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function destroy(string $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_office', $user)){
            $office = Office::where('id', $id)->first();
            $office->delete();
            return redirect()->route('admin.office.index')->with('success', 'Office deleted successfully..!');
        }else{
            return abort(403, "You don't have permission..!");
        }
    }
}
