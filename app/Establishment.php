<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $touches = ['users'];

    public function users(){
        return $this->belongsToMAny('App\User', 'establishments_users', 'user_id', 'establishment_id')
        ->withPivot('establishment_id','branch_id','user_id','degree', 'section', 'shift', 'year')
        ->withTimestamps();
    }

    public function branches(){
        return $this->hasMany('App\Branch');
    }


    public function test(){
        return $this->belongsToMany(Establishment::class)
                ->wherePivot('user_id', 1);
    }
}
