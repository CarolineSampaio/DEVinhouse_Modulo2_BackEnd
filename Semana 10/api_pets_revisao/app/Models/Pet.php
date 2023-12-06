<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'age', 'weight', 'size', 'breed_id', 'specie_id', 'client_id'];

    protected $hidden = ['created_at', 'updated_at'];


    public function breed() {
        return $this->hasOne(Breeds::class, 'id', 'breed_id');
    }

    public function specie() {
        return $this->hasOne(Specie::class, 'id', 'specie_id');
    }

    public function vaccines() {
        return $this->hasMany(Vaccine::class);
    }
}
