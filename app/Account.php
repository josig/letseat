<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    
    public function users()
    {
        return $this->belongstoMany('App\User', 'users_accounts', 'id_account', 'id_user')->withTimestamps();
    }
}
