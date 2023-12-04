<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * Get all of the artists for the Instrument
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artists(): HasMany
    {
        return $this->hasMany(Artist::class, 'favorite_istrument_id', 'id');
    }
}
