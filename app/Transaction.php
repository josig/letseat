<?php

namespace App;

use App\User;
use App\TransactionConcept;
use App\PaymentMethod;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'id_user','id_paymentMethod','id_transactionConcept','id_businessDocument','id_currency','amount','reference'
    ];

    public function paymentsMethods()
    {
        return $this->hasOne('App\PaymentMethod', 'id', 'id_paymentMethod');
    }

    public function transactionsConcepts()
    {
        return $this->hasOne('App\TransactionConcept', 'id', 'id_transactionConcept');
    }

    public function businessesDocuments()
    {
        return $this->hasOne('App\BusinessDocument', 'id', 'id_businessDocument');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
