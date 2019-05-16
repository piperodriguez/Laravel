<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*con esto evitamos el tinyint que coloca cuando ejecutamos la migracion*/

    protected $casts = [
    'is_admin' => 'boolean',
    ];

    public function isAdmin()
    {
        return $this->email === 'vargasjuan367@gmail.com';
    }

    public function getNombrecompletoAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
