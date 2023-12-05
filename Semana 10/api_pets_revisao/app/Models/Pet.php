<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    use HasFactory;

    protected $fillable = ['name', 'age', 'weight', 'size', 'breed_id', 'specie_id'];

    protected $hidden = ['created_at', 'updated_at'];


    public function breed() {
        return $this->hasOne(Breeds::class, 'id', 'breed_id');
    }

    public function specie() {
        return $this->hasOne(Specie::class, 'id', 'specie_id');
    }
}
