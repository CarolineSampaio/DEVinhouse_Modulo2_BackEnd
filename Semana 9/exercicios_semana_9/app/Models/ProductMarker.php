<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMarker extends Model
{
    use HasFactory;

    protected $table = 'products_markers';

    protected $fillable = ['product_id', 'marker_id'];
}
