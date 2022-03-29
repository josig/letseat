<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthCondition extends Model
{
    protected $table = 'healthConditions';
    protected $fillable = [
        'id_user', 'id_healthCondition'
    ];

    public function users()
    {
        return $this->belongstoMany('App\Users', 'users_healthConditions', 'id_healthCondition', 'id_user');
    }
}
