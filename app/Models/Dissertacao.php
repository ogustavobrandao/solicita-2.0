<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dissertacao extends Model
{
    use HasFactory;

    /**
     * Get the fichaCatalografica that owns the Dissertacao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fichaCatalografica(): BelongsTo
    {
        return $this->belongsTo(FichaCatalografica::class);
    }
}
