<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequirement extends Model {
    use HasFactory;

    protected $table = 'products_requirements';

    protected $fillable = [
        'operational_system',
        'product_id',
        'operational_system',
        'memory',
        'storage',
        'observations',
        'type'
    ];
}
