<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    use HasFactory;

    protected $table = 'pets'; //nome da tabela, se for diferente do nome da classe

    protected $fillable = ['name', 'age', 'weight', 'size'];
}
