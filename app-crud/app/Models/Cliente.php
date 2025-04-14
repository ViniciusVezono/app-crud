<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
 
    protected $fillable = [
        'nome',
        'email',
        'cpf_cnpj',
        'telefone',
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

}
