<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['name', 'price', 'cover', 'description'];

    protected $casts = [
        'price' => 'float'
    ];

    public function markers() {
        return $this->belongsToMany(Marker::class, 'products_markers', 'product_id', 'marker_id');
    }

    public function avaliations() {
        return $this->hasMany(Avaliation::class);
    }
}
