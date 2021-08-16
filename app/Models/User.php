<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Photo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function is_supervisor()
    {
        return $this->role()->where('id', 1)->exists();
    }

    public function is_dispatcher()
    {
        return $this->role()->where('id', 2)->exists();
    }

    public function ambulance()
    {
        $driver = $this->role()->where('id', 3)->exists();
        if ($driver) {
            return $driver->hasOne(Ambulance::class);
        }
    }
}
