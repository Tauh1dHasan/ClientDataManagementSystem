<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function hostUser()
    {
        return $this->belongsTo(User::class, 'host_user_id', 'id');
    }

    public function visitorUser()
    {
        return $this->belongsTo(User::class, 'visitor_user_id', 'id');
    }

    public function hostUserInfo()
    {
        return $this->belongsTo(UserInfo::class, 'host_user_id', 'user_id');
    }

    public function visitorUserInfo()
    {
        return $this->belongsTo(UserInfo::class, 'visitor_user_id', 'user_id');
    }

    public function userName($id)
    {
        $userName = User::select('name_en')->where('id', $id)->first();
        return $userName->name_en;
    }

    public function statusWiseCount($status_id)
    {
        $count = Appointment::where('appointment_status', $status_id)->count();
        return $count;
    }

}
