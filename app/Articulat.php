<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulat extends Model
{
    protected $guarded = [];

    public function comunicate()
    {
        return $this->hasOne('App\Comunicate', 'articulate_id','id');
    }

    public function takecation()
    {
        return $this->hasOne('App\TakeAction', 'articulate_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id',)->with('mentoruser');
    }
}
