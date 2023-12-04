<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model {
    use HasFactory;

    protected $table = 'avaliations';

    protected $fillable = ['product_id', 'description', 'recommended'];
}
