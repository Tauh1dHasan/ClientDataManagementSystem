<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['application_type_id', 'name', 'created_by', 'updated_by'];

    public function applicationType()
    {
        return $this->belongsTo(ApplicationType::class);
    }

}
