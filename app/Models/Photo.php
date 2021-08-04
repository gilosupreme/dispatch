<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Photo extends Model
{
    use HasFactory;

    protected $path = '/images/';

    protected $fillable = [
        'path'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getPathAttribute($value)
    {
        return $this->path . $value;
    }
}
