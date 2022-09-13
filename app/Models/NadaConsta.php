<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NadaConsta extends Model
{
    public function requisicao_documento(){
        return $this->belongsTo('App\Models\Requisicao_documento');
    }

    public function hasAttribute($anexo_comprovante_deposito)
    {
        return array_key_exists($anexo_comprovante_deposito, $this->anexo_comprovante_deposito);
    }

    use HasFactory;
}
