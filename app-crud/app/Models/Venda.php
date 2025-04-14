<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function cliente()
{
    return $this->belongsTo(Cliente::class);
}

public function recebimento()
{
    return $this->hasOne(Recebimento::class);
}
}
