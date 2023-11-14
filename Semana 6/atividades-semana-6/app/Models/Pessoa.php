<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'contact'
    ];

    // Oculta informações do banco de dados no retorno da API
    protected $hidden = [];
}
