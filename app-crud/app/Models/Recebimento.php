<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }
}
