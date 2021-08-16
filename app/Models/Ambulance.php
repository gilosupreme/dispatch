<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ambulance extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_no',
        'status',
        'driver_id',
        'incident_id'
    ];

    public function driver()
    {
        return $this->belongsTo(User::class);
    }
}
