<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NTDListSeeder::class,
            OtuListSeeder::class,
        ]);
    }
}

// php artisan db:seed   // - полная загрузка
// php artisan db:seed --class=OtuListSeeder  // загрузка конкретного сидера