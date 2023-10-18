<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        "doc_tratamento_excepcional",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
