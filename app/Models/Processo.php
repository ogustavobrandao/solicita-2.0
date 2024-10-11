<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_tratamento','tipo_processo', 'data_requerimento', 'motivo', 'semestre_conclusao', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
