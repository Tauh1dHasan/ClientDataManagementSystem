<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_info_id', 'application_id', 'start_date', 'estimated_end_date',
        'actual_end_date', 'note', 'status', 'created_by', 'updated_by'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    
}
