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
            AdminSeeder::class,
            PostSeeder::class,
            SettingSeeder::class,
            OfficialSeeder::class,
            SliderSeeder::class,
            GallerySeeder::class,
            ServiceSeeder::class,
            PotentialSeeder::class,
        ]);
    }
}
