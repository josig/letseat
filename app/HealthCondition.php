<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthCondition extends Model
{
    protected $table = 'healthConditions';
    protected $fillable = [
        'user_id', 'healthCondition_id'
    ];

    public function users()
    {
        return $this->belongstoMany('App\Users', 'users_healthConditions', 'healthCondition_id', 'user_id');
    }
}
