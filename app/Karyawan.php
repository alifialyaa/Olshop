<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use Notifiable;

    protected $guard = 'karyawan';  //mengarah pada file auth pada guard;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'username', 'jenisKelamin', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function getAuthPassword() {
    //     return $this->hash; 
    // }
    // public function setPasswordAttribute($value)
    // {
    //     if( \Hash::needsRehash($value)){
    //         $value = \Hash::make($value);
    //     }
    //     $this->attributes['password'] = $value;
    // }
}
