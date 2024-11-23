<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }
    
    public function userAddress()
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id');
    }


    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function updatedUser()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function officeName($id)
    {
        $officeName = Office::select('name')->where('id', $id)->first();
        return $officeName->name;
    }

    public function departmentName($id)
    {
        $departmentName = Department::select('name')->where('id', $id)->first();
        return $departmentName->name;
    }

    public function designationName($id)
    {
        $designationName = Designation::select('name')->where('id', $id)->first();
        return $designationName->name;
    }

    public function updatedUserName($id)
    {
        $updatedUserName = User::select('name_en')->where('id', $id)->first();
        return $updatedUserName->name_en;
    }

    public function createdUserName($id)
    {
        $createdUserName = User::select('name_en')->where('id', $id)->first();
        return $createdUserName->name_en;
    }

    public function presentDivisionName($id)
    {
        $presentDivisionName = Division::select('name')->where('id', $id)->first();
        return $presentDivisionName->name;
    }

    public function presentDistrictName($id)
    {
        $presentDistrictName = District::select('name')->where('id', $id)->first();
        return $presentDistrictName->name;
    }

    public function presentUpazilaName($id)
    {
        $presentUpazilaName = Upazila::select('name')->where('id', $id)->first();
        return $presentUpazilaName->name;
    }

    
}
