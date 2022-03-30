<?php

namespace App;

use App\User;
use App\TransactionConcept;
use App\PaymentMethod;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id','paymentMethod_id','transactionConcept_id','businessDocument_id','currency_id','amount','reference'
    ];

    public function paymentsMethods()
    {
        return $this->hasOne('App\PaymentMethod', 'id', 'paymentMethod_id');
    }

    public function transactionsConcepts()
    {
        return $this->hasOne('App\TransactionConcept', 'id', 'transactionConcept_id');
    }

    public function businessesDocuments()
    {
        return $this->hasOne('App\BusinessDocument', 'id', 'businessDocument_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
