<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaCatalografica extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = ['cutter', 'classificacao', 'autor', 'titulo', 'subtitulo', 'local', 'ano', 'folhas', 'ilustracao'];


    public function tipo_documento(){
        return $this->hasOne('App\Models\TipoDocumento');
    }
}
