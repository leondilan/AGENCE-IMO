<?php

namespace Database\Factories;

use App\Models\BiensImmo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=BiensImmo::class;
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(2),
            'surface' => fake()->numberBetween(10,70),
            'prix' => fake()->numberBetween(50000,350000),
            'description' => fake()->sentences(10,true),
            'piece' => fake()->numberBetween(2,8),
            'chambre' => fake()->numberBetween(2,8),
            'addresses' => fake()->sentence(3),
            'ville' => fake()->sentence(3),
            'idUser' => fake()->numberBetween(1,6),
        ];
    }
}
