<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MentorUser extends Model
{
    protected $guarded = [];

     public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function articulate()
    {
       return $this->hasMany('App\Articulat','user_id','user_id');
    }

    public function mentor()
    {
        return $this->hasOne('App\User','id','mentor_id');
    }
}
