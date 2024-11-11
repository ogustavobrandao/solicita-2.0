<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Requisicao_documento extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['anotacoes','status','status_data','detalhes'];

    public function requisicao(){
        return $this->belongsTo('App\Models\Requisicao', 'requisicao_id');
    }
    public function documento(){
        return $this->belongsTo(Documento::class);
    }

    public function nadaConsta(){
        return $this->belongsTo(NadaConsta::class);
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class);
    }

    public function fichaCatalografica()
    {
        return $this->belongsTo(FichaCatalografica::class);
    }

    /**
     * Get all of the retificacoes for the Requisicao_documento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function retificacoes(): HasMany
    {
        return $this->hasMany(Retificacao::class);
    }

    public function bibliotecario()
    {
        return $this->belongsTo(Bibliotecario::class);
    }

    public function aluno(){
        return $this->belongsTo('App\Models\Aluno','aluno_id');
    }
}
