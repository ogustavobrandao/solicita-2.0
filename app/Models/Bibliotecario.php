<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function biblioteca(){
        return $this->belongsTo('App\Models\Biblioteca');
    }

    public function requisicao_documento(){
        return $this->hasMany('App\Models\Requisicao_documento');
    }
}
