<?php

namespace App\Models;
use App\Models\User; 

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'cliente_id',
        'user_id',
        'valor',
        'data',
    ];

    public function cliente()
{
    return $this->belongsTo(Cliente::class);
}



public function user()
{
    return $this->belongsTo(User::class);
}


public function recebimento()
{
    return $this->hasOne(Recebimento::class);
}
}
