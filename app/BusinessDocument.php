<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDocument extends Model
{
    protected $table = 'businessesDocuments';

    protected $fillable = [
        'businessDocumentDetail_id'
    ];

    public function businessesDocumentsTypes(){
        return $this->hasOne('App\BussinesDocumentType', 'businessDocumentType_id', 'id')->withTimestamps();
    }
}