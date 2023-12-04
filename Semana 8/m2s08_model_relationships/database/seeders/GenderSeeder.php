<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender as GenderModel;

class GenderSeeder extends Seeder
{
    const GENDERS = [
        'Dance/Eletrônica',
        'Rock',
        'Jazz',
        'R&B',
        'Country',
        'Pop',
        'Hip-hop',
        'Clássica',
        'Reggae',
        'Bossa Nova',
        'Kpop'
    ];

    public function run(): void
    {
        foreach (self::GENDERS as $gender)
        {
            GenderModel::firstOrCreate(['name' => $gender]);
        }
    }
}
