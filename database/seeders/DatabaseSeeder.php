<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            LessonSeeder::class,
            TestWorkSeeder::class,
            TestGradingScaleSeeder::class,
        ]);
    }
}