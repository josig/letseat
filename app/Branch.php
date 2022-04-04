<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function establishment(){
        return $this->belongsTo(Establishment::class);
    }
}
