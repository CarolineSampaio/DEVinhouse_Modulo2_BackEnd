<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model {
    use HasFactory;

    protected $fillable = ['people_id', 'speciality', 'register'];

    public function people() {
        return $this->hasOne(People::class, 'id', 'people_id');
    }
}
