<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;

    public function clientData()
    {
        return $this->hasMany(ClientData::class, 'client_info_id', 'id');
    }
}
