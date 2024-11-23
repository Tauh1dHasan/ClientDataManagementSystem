<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\UserInfo;
use App\Models\User;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_VMS', $user)){
            
            menuSubmenu('manage_VMS', 'visitor_list');

            if(($request->name) && ($request->name != '')){
                $searchQuery = $request->name;
                $visitors = UserInfo::with('user')->whereHas('user', function ($query) use ($searchQuery) {
                    $query->where('user_type', 4);
                    $query->where('name_en', 'like','%'.$searchQuery.'%')->orWhere('mobile', 'like','%'.$searchQuery.'%');
                })->latest()->paginate(20);
            }elseif(($request->visitor_status != '') && ($request->visitor_status == 1)){
                $visitors = UserInfo::with('user')->whereHas('user', function ($query){
                    $query->where('user_type', 4);
                    $query->where('status', 1);
                })->latest()->paginate(20);
            }elseif(($request->visitor_status != '') && ($request->visitor_status != 1)){
                $visitors = UserInfo::with('user')->whereHas('user', function ($query){
                    $query->where('user_type', 4);
                    $query->where('status', '!=', 1);
                })->latest()->paginate(20);
            }else{
                $visitors = UserInfo::with('user')->whereHas('user',function($query){
                    $query->where('user_type', 4);
                })->latest()->paginate(20);
            }

            return view('backend.admin.visitor.index', compact('visitors'));

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('add_visitor', $user)){
            menuSubmenu('manage_VMS', 'visitor_list');
            
            return view('backend.admin.visitor.create');

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_visitor', $user)){
            
            $request->validate([
                'name_en' => 'required',
                'mobile' => 'required|unique:users|max:11',
                'email' => 'required|unique:users',
                'password' => 'required|confirmed',
            ]);
            
            $newUser = new User;
            $newUser->name_bn = $request->name_bn;
            $newUser->name_en = $request->name_en;
            $newUser->email = $request->email;
            $newUser->mobile = $request->mobile;
            $newUser->user_type = 4;
            $newUser->role_id = 4;
            $newUser->status = 1;
            $newUser->password = Hash::make($request->password);
            $newUser->save();

            $userInfo = new UserInfo;
            $userInfo->user_id = $newUser->id;
            $userInfo->address = $request->address;
            $userInfo->gender = $request->gender;
            $userInfo->dob = $request->dob;
            $userInfo->nid_no = $request->nid_no;
            $userInfo->passport_no = $request->passport_no;
            $userInfo->driving_license_no = $request->driving_license_no;
            $userInfo->visitor_organization = $request->visitor_organization;
            $userInfo->visitor_designation = $request->visitor_designation;
            $userInfo->created_by = $user->id;

            if($request->image){
                $cp = $request->file('image');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
                Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
                $userInfo->image = $randomFileName;
            }

            $userInfo->save();

            return redirect()->route('admin.visitor.index')->with('success', 'New Visitor added successfully...!');
            

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function show($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_visitor', $user)){

            menuSubmenu('manage_VMS', 'visitor_list');

            $visitor = UserInfo::with('user')->where('id', $id)->first();
            return view('backend.admin.visitor.show', compact('visitor'));

        }else{
            return abort(403, "You don't have permission");
        }
    }

    public function edit($id)
    {
        $user = Auth::user();

        if(Gate::allows('edit_visitor', $user) or ($user->user_type = 4)){
            
            menuSubmenu('manage_VMS', 'visitor_list');

            $visitor = UserInfo::where('id', $id)->first();
            return view('backend.admin.visitor.edit', compact('visitor'));

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_visitor', $user) or $user->user_type = 4){
            
            $this->validate($request, [
                'name_bn' => 'required',
                'name_en' => 'required',
                'mobile' => 'required|unique:users,mobile,' . $request->user_id,
                'email' => 'required|unique:users,email,' . $request->user_id,
            ]);
            
            $newUser = User::where('id', $request->user_id)->first();
            $newUser->name_bn = $request->name_bn;
            $newUser->name_en = $request->name_en;
            $newUser->email = $request->email;
            $newUser->mobile = $request->mobile;
            $newUser->save();

            $userInfo = UserInfo::where('id', $request->visitor_id)->first();
            $userInfo->address = $request->address;
            $userInfo->gender = $request->gender;
            $userInfo->dob = $request->dob;
            $userInfo->nid_no = $request->nid_no;
            $userInfo->passport_no = $request->passport_no;
            $userInfo->driving_license_no = $request->driving_license_no;
            $userInfo->visitor_organization = $request->visitor_organization;
            $userInfo->visitor_designation = $request->visitor_designation;
            $userInfo->updated_by = $user->id;

            if($request->image){

                $imagePath = public_path(). '/storage/userImages/' . $userInfo->image;
                
                if(($userInfo->image != '') && ($userInfo->image != NULL)) {
                    if(file_exists($imagePath)){
                        unlink($imagePath);
                    }
                }

                $cp = $request->file('image');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
                Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
                $userInfo->image = $randomFileName;
            }

            $userInfo->save();

            return redirect()->back()->with('success', 'Visitor profile updated successfully...!');
            

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_visitor', $user)){
            $visitor = UserInfo::where('id', $id)->first();

            $imagePath = public_path(). '/storage/userImages/' . $visitor->image;

            if(($visitor->image != '') || ($visitor->image != NULL)) {
                if(file_exists($imagePath)){
                    unlink($imagePath);
                }
            }

            $visitor->delete();

            $userId = User::where('id', $visitor->user_id)->first();
            $userId->delete();

            return redirect()->route('admin.visitor.index')->with('success', 'Visitor deleted successfully.');
        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('update_visitor_status', $user)){
            $user = User::where('id', $id)->first();
            $user->status = $request->visitor_status ?? 0;
            $user->save();
            return redirect()->back()->with('success', 'Visitor status updated successfully..!');
        }else{
            return abort(403, "You don't have permission..!");
        }
    }


}
