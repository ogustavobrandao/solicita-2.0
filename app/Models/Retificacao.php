<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Retificacao extends Model
{
    use HasFactory;

    protected $fillable = ['anexo'];

    /**
     * Get the RequisicaoDocumento that owns the Retificacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function RequisicaoDocumento(): BelongsTo
    {
        return $this->belongsTo(Requisicao_documento::class);
    }
}
