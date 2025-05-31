<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/* included models */
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserAddress;
use App\Models\Appointment;
use App\Models\ClientInfo;
use App\Models\ClientData;
use App\Models\ClientTask;

class IndexController extends Controller
{

    public function login ()
    {
        return view('auth.login');
    }

    public function adminDashboard()
    {
        $user = Auth::user();
        menuSubmenu('dashboard', 'dashboard');

        $date = date('Y-m-d');

        // Card counts
        $visitor_count = User::where('role_id', 4)->where('status', 1)->count();
        $host_count = User::where('role_id', 3)->where('status', 1)->count();

        $clientInfoCount = ClientInfo::count();
        $clientDataCount = ClientData::count();
        $pendingClientTaskCount = ClientTask::where('status', 1)->count();

        if($user->role_id == 3){
            $total_appointment_count = Appointment::where('host_user_id', $user->id)->count();
            $today_appointment_count = Appointment::where('host_user_id', $user->id)->where('appointment_date', $date)->count();
        }elseif($user->role_id == 4){
            $total_appointment_count = Appointment::where('visitor_user_id', $user->id)->count();
            $today_appointment_count = Appointment::where('visitor_user_id', $user->id)->where('appointment_date', $date)->count();
        }else{
            $total_appointment_count = Appointment::count();
            $today_appointment_count = Appointment::where('appointment_date', $date)->count();
        }

        // Charts data
        $statusWiseDatas = Appointment::groupBy('appointment_status')->get();
        $monthlyDatas = Appointment::select(DB::raw('DATE_FORMAT(appointment_date, "%b") as month, COUNT(*) as count'))->groupBy('month')->orderBy(DB::raw('MONTH(appointment_date)'), 'asc')->get();

        return view('backend.index', compact('visitor_count', 'host_count', 'total_appointment_count', 'today_appointment_count', 'date', 'statusWiseDatas', 'monthlyDatas', 'clientInfoCount', 'clientDataCount', 'pendingClientTaskCount'));

    }

    public function store(Request $request)
    {
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
        $newUser->status = 2;
        $newUser->password = Hash::make($request->password);
        $newUser->save();

        $userInfo = new UserInfo;
        $userInfo->user_id = $newUser->id;
        // $userInfo->address = $request->address;
        // $userInfo->gender = $request->gender;
        // $userInfo->dob = $request->dob;
        // $userInfo->nid_no = $request->nid_no;
        // $userInfo->passport_no = $request->passport_no;
        // $userInfo->driving_license_no = $request->driving_license_no;
        // $userInfo->visitor_organization = $request->visitor_organization;
        // $userInfo->visitor_designation = $request->visitor_designation;
        $userInfo->created_by = $newUser->id;

        $userAddress = new UserAddress;
        $userAddress->user_id = $newUser->id;
        $userAddress->save();

        if($request->image){
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
            $userInfo->image = $randomFileName;
        }

        $userInfo->save();

        return redirect()->route('login')->with('success', 'Wait for approval..!');
            
    }

}