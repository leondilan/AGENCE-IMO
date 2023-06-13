<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BiensImmo;
use App\Models\ImageImmo;
use App\Models\optionsBiens;
use App\Models\OptionsImmo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        BiensImmo::factory(50)->create();
        ImageImmo::factory(100)->create();
        OptionsImmo::factory(100)->create();
        optionsBiens::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
