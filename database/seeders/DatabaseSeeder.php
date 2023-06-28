<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ReportTypeSeeder;
use Database\Seeders\FormCategorySeeder;
use Database\Seeders\ResponderRequestTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            ResponderRequestTypeSeeder::class,
            ReportTypeSeeder::class,
            FormCategorySeeder::class,
        ]);
    }
}
