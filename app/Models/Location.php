<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ambulance;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'latitude',
        'longitude',
        'hospital'
    ];

    public function ambulances()
    {
        return $this->hasMany(Ambulance::class);
    }
}
