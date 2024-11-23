<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

/* included models */
use App\Models\Designation;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Department;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user))
        {
            if(Gate::allows('all_users', $user))
            {
                menuSubmenu('roles', 'allUsers');

                $userQuery = User::with('role', 'designation');

                if(($request->name != '') && ($request->name != NULL)) {
                    $searchQuery = $request->name;
                    $userQuery->where(function($query) use($searchQuery){
                        $query->where('name_en', 'like', '%'.$searchQuery.'%')->orWhere('name_bn', 'like', '%'.$searchQuery.'%');
                    });
                }

                if(($request->role_id != '') && ($request->role_id != NULL)) {
                    $searchRole = $request->role_id;
                    $userQuery->where(function($query) use($searchRole){
                        $query->where('role_id', $searchRole);
                    });
                }

                if($user->role_id == 1){
                    $roles = Role::where('status', 1)->get();
                }else{
                    $roles = Role::where('id', '!=', 1)->where('status', 1)->get();
                }

                $users = $userQuery->latest()->paginate(25);

                return view('backend.admin.user.index', compact('roles', 'users'));
            }
        }
    }

    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('user_management', $user)) 
        {
            if(Gate::allows('add_user',$user))
            {                
                menuSubmenu('roles', 'addUser');

                $query = Role::where('status', 1);

                if($user->role_id == 1){
                    $roles = Role::where('id', '!=', 4)->where('status', 1)->get();
                }else{
                    $roles = Role::whereNotIn('id', [1,4])->where('status', 1)->get();
                }

                $designations = Designation::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();

                return view('backend.admin.user.create', compact('roles', 'designations', 'departments'));
                
            }
            else
            {
                abort(403, "You don't have permission..!");
            }
        }
        else
        {
            abort(403, "You don't have permission..!");
        }
        
    }

    public function store(Request $request)
    {        
        $request->validate([
            'name'              => 'required|max:255',
            'role_id'           => 'required',
            'designation_id'    => 'required',
            'designation_id'    => 'required',
            'password'          => 'required|min:8',
            'mobile'            => 'required|unique:users',
            'email'             => 'required|unique:users',
        ]);

        $user = new User;
        $user->name_en              = $request->name;
        $user->name_bn              = $request->name;
        $user->role_id              = $request->role_id;
        $user->email                = $request->email;
        $user->mobile               = $request->mobile;
        $user->password             = bcrypt($request->password);
        $user->status               = 1;
        $user->save();
        
        $userInfo = new UserInfo;
        $userInfo->user_id          = $user->id;
        $userInfo->department_id    = $request->department_id;
        $userInfo->designation_id   = $request->designation_id;
        $userInfo->address          = $request->present_address;

        if($request->hasFile('image'))
        {
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'image'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));
            $userInfo->image = $randomFileName;
        } 
        $userInfo->save();

        $userAddress = new UserAddress;
        $userAddress->user_id = $user->id;
        $userAddress->present_address = $request->present_address;
        $userAddress->permanent_address = $request->permanent_address;
        $userAddress->save();

        return redirect()->route('admin.user.index')->with('success', 'User Created Successfully');
    }


    public function show($id)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('view_user',$userr)){    
                
                menuSubmenu('roles', 'allUsers');

                $user = User::with('designation', 'role', 'userInfo', 'userAddress')->where('id', $id)->first();
                return view('backend.admin.user.show', compact('user'));

            }else{
                abort(403, "You don't have permission..!");
            }
        }
        else
        {
            abort(403, "You don't have permission..!");
        }
    }


    public function edit($id)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('edit_user',$userr))
            { 

                menuSubmenu('roles', 'allUsers');

                $query = Role::where('status', 1);
                if(Auth::user()->role_id != 1){
                    $query = $query->where('id','!=',1);
                }
                $roles = $query->get();
                $designations = Designation::where('status', 1)->get();
                $departments = Department::where('status', 1)->get();
                $user = User::with('userInfo', 'userAddress')->where('id', $id)->first();

                return view('backend.admin.user.edit', compact('roles', 'designations', 'user', 'departments'));
                
            }
            else
            {
                abort(403, "You don't have permission..!");
            }
        }
        else
        {
            abort(403, "You don't have permission..!");
        }
        
    }


    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'name'              => 'required|max:255',
            'role_id'           => 'required',
            'mobile'            => 'required|unique:users,mobile,'.$user->id,
            'email'             => 'required|email|unique:users,email,'.$user->id,
            'department_id'     => 'required',
            'designation_id'    => 'required',
            'status'            => 'required',
        ]);

        $user->name_en = $request->name;
        $user->name_bn = $request->name;
        $user->role_id              = $request->role_id;
        $user->email                = $request->email;
        $user->mobile               = $request->mobile;
        $user->status               = $request->status ?? 1;
        $user->save();

        $userInfo = UserInfo::where('user_id', $id)->first();
        $userInfo->department_id    = $request->department_id;
        $userInfo->designation_id   = $request->designation_id;
        $userInfo->address          = $request->present_address;

        if($request->hasFile('image'))
        {
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'image'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));

            if($userInfo->image)
            {
                $f = 'users/'.$userInfo->image;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $userInfo->image = $randomFileName;
        } 
        
        $userInfo->save();

        $userAddress = UserAddress::where('user_id', $id)->first();
        $userAddress->present_address = $request->present_address;
        $userAddress->permanent_address = $request->permanent_address;
        $userAddress->save();

        return redirect()->route('admin.user.index')->with('success', 'User Information Updated Successfully');
    }


    public function block(User $user)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('block_user',$userr))
            { 
                
                if ($user->status == 0) {
                    $user->status       = 1;
                }
                else if ($user->status == 1) {
                    $user->status       = 0;
                }

                $user->save();

                return redirect()->route('admin.user.index')->with('success', 'User Blocked Successfully.');
                
            }
            else
            {
                abort(403, "You don't have permission..!");
            }
        }
        else
        {
            abort(403, "You don't have permission..!");
        }
        
    }


    public function destroy(User $user)
    {
        $userr = Auth::user();

        if (Gate::allows('user_management', $userr)) 
        {
            if(Gate::allows('delete_user',$userr))
            {                
               
                if ($user->status == 2) {
                    $user->status       = 1;
                }
                else if ($user->status == 0 || $user->status == 1) {
                    $user->status       = 2;
                }
        
                $user->save();
        
                return redirect()->route('admin.user.index')->with('success', 'User Deleted Successfully.');
                
            }
            else
            {
                abort(403, "You don't have permission..!");
            }
        }
        else
        {
            abort(403, "You don't have permission..!");
        }
    }

    public function updatePassword(Request $request, $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $old_password = User::where('id', $user)->first();
        if (!empty($old_password))
        {
            $password = Hash::check($request->current_password, $old_password->password);
            if ($password)
            {
                $current_user = User::find($user);
                $current_user->password = bcrypt($request->password);
                $current_user->save();

                return back()->with('success', 'Password Updated Successfully');

            } else {
                return back()->with('error', 'Password did not matched!');
            }
        } else {
            return back()->with('error', 'Password can not be empty');
        }
    }


    public function editProfile(Request $request, $username)
    {
        $userId = Crypt::decryptString($username);
        $roles = Role::where('status', 1)->get();
        $departments = Department::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();

        $user = User::with('userInfo', 'userAddress')->find($userId);
        if(Auth::user()->id == $userId)
        {
            return view('backend.admin.user.editProfile', compact('roles', 'designations', 'user', 'departments'));
        }
        else
        {
            abort(401);
        }
    }


    public function updateProfile(Request $request, $user)
    {
        $user = User::where('id', $user)->first();

        $request->validate([
            'name'        => 'required|max:255',
            'mobile'            => 'required',
            'email'             => 'required|email|unique:users,email,'.$user->id,
            'image'             => 'file|mimes:png,gif,jpeg|max:2048',
        ]);
        
        $user->name_en              = $request->name;
        $user->name_bn              = $request->name;
        $user->mobile               = $request->mobile;
        $user->email                = $request->email;
        $user->save();

        $userAddress = UserAddress::where('user_id', $user->id)->first();
        $userAddress->present_address      = $request->present_address;
        $userAddress->permanent_address    = $request->permanent_address;
        $userAddress->save();

        $userInfo = UserInfo::where('user_id', $user->id)->first();

        if($request->hasFile('image'))
        {
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'image'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('users/'.$randomFileName, File::get($cp));

            if($userInfo->image)
            {
                $f = 'users/'.$userInfo->image;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $userInfo->image = $randomFileName;
        } 
        $userInfo->save();
        
        return back()->with('success', 'Profile Updated Successfully');
    }



}
