<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

use App\Models\UserInfo;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Notification;

use App\Mail\AppointmentCreateMail;
use App\Mail\AppointmentCreateMailForVisitor;

use App\Mail\AppointmentCancelMailToHost;
use App\Mail\AppointmentCancelMailToVisitor;

use App\Mail\AppointmentRescheduleMailToHost;
use App\Mail\AppointmentRescheduleMailToVisitor;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('appointment_list', $user)){

            menuSubmenu('manage_VMS', 'appointment_list');

            if(($user->role_id != 4) && ($user->role_id != 3)){

                $appointmentQuery = Appointment::with('visitorUser', 'hostUser');

                if(($request->name != '') && ($request->name != NULL)){
                    $searchQuery = $request->name;
    
                    $appointmentQuery->whereHas('visitorUser', function($query) use($searchQuery) {
                        $query->where('name_en', 'like', '%'.$searchQuery.'%')->orWhere('mobile', 'like', '%'.$searchQuery.'%');
                    })->orWhereHas('hostUser', function($queryTwo) use($searchQuery) {
                        $queryTwo->where('name_en', 'like', '%'.$searchQuery.'%')->orWhere('mobile', 'like', '%'.$searchQuery.'%');
                    });
    
                }
                if(($request->from != '') && ($request->from != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->from);
                }
                if(($request->to != '') && ($request->to != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->to);
                }
                if(($request->status != '') && ($request->status != NULL)){
                    $appointmentQuery->where('appointment_status', $request->status);
                }

            }elseif($user->role_id == 4){
                $appointmentQuery = Appointment::with('visitorUser', 'hostUser')->where('visitor_user_id', $user->id);

                if(($request->name != '') && ($request->name != NULL)){
                    $searchQuery = $request->name;
    
                    $appointmentQuery->whereHas('visitorUser', function($query) use($searchQuery) {
                        $query->where('name_en', 'like', '%'.$searchQuery.'%')->orWhere('mobile', 'like', '%'.$searchQuery.'%');
                    });
    
                }
                if(($request->from != '') && ($request->from != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->from);
                }
                if(($request->to != '') && ($request->to != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->to);
                }
                if(($request->status != '') && ($request->status != NULL)){
                    $appointmentQuery->where('appointment_status', $request->status);
                }
            }elseif($user->role_id == 3){
                $appointmentQuery = Appointment::with('visitorUser', 'hostUser')->where('host_user_id', $user->id);

                if(($request->name != '') && ($request->name != NULL)){
                    $searchQuery = $request->name;
    
                    $appointmentQuery->whereHas('hostUser', function($query) use($searchQuery) {
                        $query->where('name_en', 'like', '%'.$searchQuery.'%')->orWhere('mobile', 'like', '%'.$searchQuery.'%');
                    });
    
                }
                if(($request->from != '') && ($request->from != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->from);
                }
                if(($request->to != '') && ($request->to != NULL)){
                    $appointmentQuery->where('appointment_date', '>=', $request->to);
                }
                if(($request->status != '') && ($request->status != NULL)){
                    $appointmentQuery->where('appointment_status', $request->status);
                }
            }

            $appointments = $appointmentQuery->latest()->paginate(20);

            return view('backend.admin.appointment.index', compact('appointments', 'user'));
            
        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('add_appointment', $user)){
            menuSubmenu('manage_VMS', 'add_appointment');

            $visitors = User::where('role_id', 4)->where('status', 1)->get();
            $hosts = User::whereIn('role_id',[3,5])->where('status', 1)->get();

            return view('backend.admin.appointment.create', compact('visitors', 'hosts', 'user'));

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_appointment', $user)){

            $request->validate([
                'visitor_user_id' => 'required',
                'host_user_id' => 'required',
                'appointment_date' => 'required',
                'appointment_time' => 'required',
                'toatl_attendees_no' => 'required',
                'appointment_purpose' => 'required',
            ]);

            $appointment = new Appointment;
            $appointment->host_user_id = $request->host_user_id;
            $appointment->visitor_user_id = $request->visitor_user_id;
            $appointment->visitor_organization = $request->visitor_organization ?? '-';
            $appointment->visitor_designation = $request->visitor_designation ?? '-';
            $appointment->appointment_date = $request->appointment_date;
            $appointment->appointment_time = $request->appointment_time;
            $appointment->total_attendees_no = $request->toatl_attendees_no;
            $appointment->appointment_purpose = $request->appointment_purpose;
            $appointment->purpose_describe = $request->purpose_describe;
            $appointment->appointment_status = 0;
            $appointment->created_by = $user->id;
            $appointment->save();

            // Database notification to host
            $notification = new Notification;
            $notification->user_id = $appointment->host_user_id;
            $notification->reference_id = $appointment->id;
            $notification->model = "Appointment";

            $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
            $route_to_store = str_replace(url('/'), "", $route_to_store);

            $notification->route_name = $route_to_store;
            $notification->title = "New appointment created for you";
            $notification->office_id = $appointment->hostUserInfo->office_id ?? NULL;
            $notification->status = 0;
            $notification->created_by = $user->id;
            $notification->save();

            // Database notification to visitor
            $visitorNotification = new Notification;
            $visitorNotification->user_id = $appointment->visitor_user_id;
            $visitorNotification->reference_id = $appointment->id;
            $visitorNotification->model = "Appointment";

            $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
            $route_to_store = str_replace(url('/'), "", $route_to_store);

            $visitorNotification->route_name = $route_to_store;
            $visitorNotification->title = "New appointment created for you";
            $visitorNotification->status = 0;
            $visitorNotification->created_by = $user->id;
            $visitorNotification->save();

            if(($appointment->hostUser->mobile ?? '') != ''){
                $data['number'] = $appointment->hostUser->mobile;
                $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', you have a pending appointment with '.$appointment->visitorUser->name_en.' at '.$request->appointment_date.' '.$request->appointment_time;

                $this->sms_send($data);
            }

            // Email to host
            Mail::to($appointment->hostUser->email)->send(new AppointmentCreateMail($appointment));
            // Email to visitor
            Mail::to($appointment->visitorUser->email)->send(new AppointmentCreateMailForVisitor($appointment));

            return redirect()->route('admin.appointment.index')->with('success', 'New Appointment created successfully...!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        if(Gate::allows('view_appointment', $user)){
            menuSubmenu('manage_VMS', 'appointment_list');
            $id = Crypt::decryptString($id);
            $appointment = Appointment::where('id', $id)->first();
            return view('backend.admin.appointment.show', compact('appointment'));

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_appointment', $user)){
            menuSubmenu('manage_VMS', 'appointment_list');

            $visitors = User::where('role_id', 4)->where('status', 1)->get();
            $hosts = User::where('role_id', 3)->where('status', 1)->get();
            $appointment = Appointment::where('id', $id)->first();
            return view('backend.admin.appointment.edit', compact('appointment', 'visitors', 'hosts'));

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_appointment', $user)){
            menuSubmenu('manage_VMS', 'appointment_list');

            $request->validate([
                'visitor_user_id' => 'required',
                'host_user_id' => 'required',
                'appointment_date' => 'required',
                'appointment_time' => 'required',
                'toatl_attendees_no' => 'required',
                'appointment_purpose' => 'required',
            ]);

            $appointment = Appointment::where('id', $id)->first();
            $appointment->host_user_id = $request->host_user_id;
            $appointment->visitor_user_id = $request->visitor_user_id;
            $appointment->visitor_organization = $request->visitor_organization;
            $appointment->visitor_designation = $request->visitor_designation;
            $appointment->total_attendees_no = $request->toatl_attendees_no;
            $appointment->appointment_purpose = $request->appointment_purpose;
            $appointment->purpose_describe = $request->purpose_describe;
            $appointment->updated_by = $user->id;
            $appointment->save();

            // Database notification to host
            $notification = new Notification;
            $notification->user_id = $appointment->host_user_id;
            $notification->reference_id = $appointment->id;
            $notification->model = "Appointment";

            $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
            $route_to_store = str_replace(url('/'), "", $route_to_store);

            $notification->route_name = $route_to_store;
            $notification->title = "Appointment Updated";
            $notification->office_id = $appointment->hostUserInfo->office_id ?? NULL;
            $notification->status = 0;
            $notification->created_by = $user->id;
            $notification->save();

            // Database notification to visitor
            $visitorNotification = new Notification;
            $visitorNotification->user_id = $appointment->visitor_user_id;
            $visitorNotification->reference_id = $appointment->id;
            $visitorNotification->model = "Appointment";

            $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
            $route_to_store = str_replace(url('/'), "", $route_to_store);

            $visitorNotification->route_name = $route_to_store;
            $visitorNotification->title = "Appointment Updated";
            $visitorNotification->status = 0;
            $visitorNotification->created_by = $user->id;
            $visitorNotification->save();

            // visitor message
            if(($appointment->hostUser->mobile ?? '') != ''){
                if($appointment->host_user_id != $request->host_user_id) {
                    $data['number'] = $appointment->hostUser->mobile;
                    $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', you\'r appointment updated with '.$appointment->visitorUser->name_en.' at '.$request->appointment_date.' '.$request->appointment_time;

                    $this->sms_send($data);
                }
            }

            // Email to host
            Mail::to($appointment->hostUser->email)->send(new AppointmentCreateMail($appointment));
            // Email to visitor
            Mail::to($appointment->visitorUser->email)->send(new AppointmentCreateMailForVisitor($appointment));

            return redirect()->route('admin.appointment.index')->with('success', 'Appointment updated successfully...!');

        }else{
            return abort(403, "You don't have permission..!");
        }
    }

    public function updateStatus(Request $request, $id)
    {

        $user = Auth::user();
        if(Gate::allows('update_appointment_status', $user)){

            if ($request->appointment_status == 4) {
                $this->validate($request, [
                    'card_number' => 'required|unique:appointments',
                ]);
            }
            
            $appointment = Appointment::where('id', $id)->first();
            $appointment->appointment_status = $request->appointment_status;
            
            if ($request->appointment_status == 5) {
                $appointment->departure_time = now();
            }

            if($request->appointment_status == 1){

                // Database notification to host
                $notification = new Notification;
                $notification->user_id = $appointment->host_user_id;
                $notification->reference_id = $appointment->id;
                $notification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $notification->route_name = $route_to_store;
                $notification->title = "Appointment Approved";
                $notification->office_id = $appointment->hostUserInfo->office_id ?? NULL;
                $notification->status = 0;
                $notification->created_by = $user->id;
                $notification->save();

                // Database notification to visitor
                $visitorNotification = new Notification;
                $visitorNotification->user_id = $appointment->visitor_user_id;
                $visitorNotification->reference_id = $appointment->id;
                $visitorNotification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $visitorNotification->route_name = $route_to_store;
                $visitorNotification->title = "Appointment Approved";
                $visitorNotification->status = 0;
                $visitorNotification->created_by = $user->id;
                $visitorNotification->save();

            }elseif($request->appointment_status == 2){
                $appointment->canceled_by = $user->id;
                $appointment->cancel_reason = $request->cancel_reason;

                // Database notification to host
                $notification = new Notification;
                $notification->user_id = $appointment->host_user_id;
                $notification->reference_id = $appointment->id;
                $notification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $notification->route_name = $route_to_store;
                $notification->title = "Appointment Declined/Canceled";
                $notification->office_id = $appointment->hostUserInfo->office_id ?? NULL;
                $notification->status = 0;
                $notification->created_by = $user->id;
                $notification->save();

                // Database notification to visitor
                $visitorNotification = new Notification;
                $visitorNotification->user_id = $appointment->visitor_user_id;
                $visitorNotification->reference_id = $appointment->id;
                $visitorNotification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $visitorNotification->route_name = $route_to_store;
                $visitorNotification->title = "Appointment Declined/Canceled";
                $visitorNotification->status = 0;
                $visitorNotification->created_by = $user->id;
                $visitorNotification->save();

                // Email to host
                Mail::to($appointment->hostUser->email)->send(new AppointmentCancelMailToHost($appointment));
                // Email to visitor
                Mail::to($appointment->visitorUser->email)->send(new AppointmentCancelMailToVisitor($appointment));

            }elseif($request->appointment_status == 3){
                
                $array_data = [];
                if(($appointment->reschedule_reason == '') || ($appointment->reschedule_reason == NULL)){
                    $data = array(
                        "index" =>1,
                        "reason" => $request->reschedule_reason,
                        "by" => $user->id,
                        "date" => $appointment->appointment_date,
                        "time" => $appointment->appointment_time,
                    );

                    array_push($array_data,$data);
                    $appointment->reschedule_reason = json_encode($array_data);

                    $appointment->canceled_by = NULL;
                    $appointment->cancel_reason = NULL;

                    $appointment->appointment_date = $request->appointment_date;
                    $appointment->appointment_time = $request->appointment_time;

                }else{
                    $existingDatas = json_decode($appointment->reschedule_reason,true);

                    $data = array(
                        "index" =>count($existingDatas) + 1,
                        "reason" => $request->reschedule_reason,
                        "by" => $user->id,
                        "date" => $appointment->appointment_date,
                        "time" => $appointment->appointment_time,
                    );
                    array_push($existingDatas,$data);
                    $appointment->reschedule_reason = json_encode($existingDatas);

                    $appointment->canceled_by = NULL;
                    $appointment->cancel_reason = NULL;

                    $appointment->appointment_date = $request->appointment_date;
                    $appointment->appointment_time = $request->appointment_time;
                }

                // Database notification to host
                $notification = new Notification;
                $notification->user_id = $appointment->host_user_id;
                $notification->reference_id = $appointment->id;
                $notification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $notification->route_name = $route_to_store;
                $notification->title = "Appointment Re-Scheduled";
                $notification->office_id = $appointment->hostUserInfo->office_id ?? NULL;
                $notification->status = 0;
                $notification->created_by = $user->id;
                $notification->save();

                // Database notification to visitor
                $visitorNotification = new Notification;
                $visitorNotification->user_id = $appointment->visitor_user_id;
                $visitorNotification->reference_id = $appointment->id;
                $visitorNotification->model = "Appointment";

                $route_to_store = route('admin.appointment.show', Crypt::encryptString($appointment->id));
                $route_to_store = str_replace(url('/'), "", $route_to_store);

                $visitorNotification->route_name = $route_to_store;
                $visitorNotification->title = "Appointment Re-Scheduled";
                $visitorNotification->status = 0;
                $visitorNotification->created_by = $user->id;
                $visitorNotification->save();

                // Email to host
                Mail::to($appointment->hostUser->email)->send(new AppointmentRescheduleMailToHost($appointment));
                // Email to visitor
                Mail::to($appointment->visitorUser->email)->send(new AppointmentRescheduleMailToVisitor($appointment));

            } else if($request->appointment_status == 4){
                $appointment->card_number = $request->card_number;
                // Webcam image processing
                if($request->visitor_photo){
                    $img = $request->visitor_photo;
                    $folderPath = public_path('appointmentImages/');
                    $image_parts = explode(";base64,", $img);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $fileName = 'visitor'.time() . '.png';
                    $file = $folderPath . $fileName;
                    file_put_contents($file, $image_base64);
                    $appointment->visitor_photo = $fileName;
                }
                
            }

            if($request->appointment_status != 4){
                $appointment->card_number = NULL;
            }

            // Sending SMS
            if($request->appointment_status == 1){
                if ($appointment->visitorUser) {
                    $data['number'] = $appointment->visitorUser->mobile;
                    $data['message'] = 'Dear Mr/Ms '.$appointment->visitorUser->name_en.', your appointment status updated, with '.($appointment->hostUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been approved';
                    $this->sms_send($data);
                }
            } else if (in_array($request->appointment_status, [2,3])) {

                if (auth()->user()->user_type == 4) {

                    if ($appointment->hostUser) {
                        $data['number'] = $appointment->hostUser->mobile;
                        if ($request->appointment_status == 2) {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', your appointment status updated, with '.($appointment->visitorUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been cenceled';
                        } else {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', your appointment status updated, with '.($appointment->visitorUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been rescheduled to '.$request->appointment_date.' '.$request->appointment_time;
                        }
                        $this->sms_send($data);
                    }

                } else if(auth()->user()->id == ($appointment->hostUser->host_user_id ?? 0)) {

                    if ($appointment->visitorUser) {
                        $data['number'] = $appointment->visitorUser->mobile;
                        if ($request->appointment_status == 2) {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->visitorUser->name_en.', your appointment status updated, with '.$appointment->hostUser->name_en.' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been cenceled';
                        } else {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->visitorUser->name_en.', your appointment status updated, with '.($appointment->hostUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been rescheduled to '.$request->appointment_date.' '.$request->appointment_time;
                        }
                        
                        $this->sms_send($data);
                    }

                } else {

                    if ($appointment->visitorUser) {
                        $data['number'] = $appointment->visitorUser->mobile;
                        
                        if ($request->appointment_status == 2) {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->visitorUser->name_en.', your appointment status updated, with '.$appointment->hostUser->name_en.' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been cenceled';
                        } else {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->visitorUser->name_en.', your appointment status updated, with '.($appointment->hostUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been rescheduled to '.$request->appointment_date.' '.$request->appointment_time;
                        }
                        $this->sms_send($data);
                    }

                    if ($appointment->hostUser) {
                        $data['number'] = $appointment->hostUser->mobile;
                        
                        if ($request->appointment_status == 2) {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', your appointment status updated, with '.$appointment->visitorUser->name_en.' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been cenceled';
                        } else {
                            $data['message'] = 'Dear Mr/Ms '.$appointment->hostUser->name_en.', your appointment status updated, with '.($appointment->visitorUser->name_en ?? '').' at '.$appointment->appointment_date.' '.$appointment->appointment_time.' has been rescheduled to '.$request->appointment_date.' '.$request->appointment_time;
                        }
                        $this->sms_send($data);
                    }

                }
            }

            $appointment->save();
            return back()->with('success', 'Appointment updated successfully..!');

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_appointment', $user)) {

            $appointment = Appointment::where('id', $id)->first();
            $appointment->delete();
            return redirect()->route('admin.appointment.index')->with('success', 'Appointment deleted successfully..!');

        }else{
            return abort(403, "You don't have permission.");
        }
    }

    public function sms_send($data) {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "y3FfVATWkcvMDn67cNkp";
        $senderid = "8809617611033";
        $number = $data['number'];
        $message = $data['message'];
     
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $number,
            "message" => $message
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
