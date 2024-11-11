<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;

    protected $fillable = [
        'anexo_comprovante_deposito',
        'anexo_tcc',
        'anexo_comprovante_autorizacao',
        'titulo_tcc',
        'anexo_publicacao_parcial',
        'autor_nome'
    ];

    public function requisicao_documento(){
        return $this->belongsTo(Requisicao_documento::class);
    }

    public function hasAttribute($anexo_comprovante_deposito)
    {
        return array_key_exists($anexo_comprovante_deposito, $this->anexo_comprovante_deposito);
    }

    public function hasAttributeNadaConsta($anexo_comprovante_nada_consta)
    {
        return array_key_exists($anexo_comprovante_nada_consta, $this->anexo_comprovante_nada_consta);
    }

}
