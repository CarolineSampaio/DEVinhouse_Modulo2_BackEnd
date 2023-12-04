<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistGender extends Model
{
    use HasFactory;

    protected $table = "artists_genders";
    protected $fillable = [
        'artist_id',
        'gender_id',
    ];
}
