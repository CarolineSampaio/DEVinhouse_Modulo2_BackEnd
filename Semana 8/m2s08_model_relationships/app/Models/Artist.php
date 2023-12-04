<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'bio',
        'is_singer',
        'favorite_instrument_id',
    ];

    protected $hidden = ['favorite_instrument_id'];

    /**
     * Get the instrument that owns the Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class, 'favorite_instrument_id', 'id');
    }

    /**
     * The roles that belong to the Artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(Gender::class, 'artists_genders', 'artist_id', 'gender_id');
    }

    public function getAgeAttribute(): int
    {
        $currDate = Carbon::now();
        return $currDate->diffInYears(Carbon::parse($this->birthdate));
    }
}
