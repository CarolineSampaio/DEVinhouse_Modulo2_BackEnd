<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender as GenderModel;
use App\Models\User as UserModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!UserModel::count())
        {
            UserModel::factory(10)->create();
        }

        if(!GenderModel::count())
        {
            $this->call([GenderSeeder::class]);
        }
    }
}
