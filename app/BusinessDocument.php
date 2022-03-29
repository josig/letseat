<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessDocument extends Model
{
    protected $table = 'businessesDocuments';

    protected $fillable = [
        'id_businessDocumentdetail'
    ];

    public function businessesDocumentsTypes(){
        return $this->hasOne('App\BussinesDocumentType', 'id_businessDocumentType', 'id')->withTimestamps();
    }
}