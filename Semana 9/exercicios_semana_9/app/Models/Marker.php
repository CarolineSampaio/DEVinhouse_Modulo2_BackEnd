<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model {
    use HasFactory;

    protected $fillable = ['name', 'color'];

    public function products() {
        return $this->belongsToMany(Product::class, 'products_markers', 'marker_id', 'product_id');
    }
}
