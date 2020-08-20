<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    ];


      
    public function user_type()
    {
       return $this->belongsTo('App\UserType','type');
    } 
   
    public function articulate()
    {
       return $this->hasMany('App\Articulat','user_id');
    }

    public function mentoruser()
    {
       return $this->hasOne('App\MentorUser','user_id')->with('mentor');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
