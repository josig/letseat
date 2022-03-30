<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $touches = ['users'];

    public function users(){
        return $this->belongsToMAny('App\Establishment', 'users_establishments', 'establishment_id', 'user_id')
        ->withPivot('degree', 'section', 'shift', 'year')
        ->withTimestamps();
    }
}
