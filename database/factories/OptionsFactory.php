<?php

namespace Database\Factories;

use App\Models\optionsBiens;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OptionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=optionsBiens::class;
    public function definition(): array
    {
        return [
            'idBiens' => fake()->numberBetween(1,50),
            'idOpt' => fake()->numberBetween(1,50),
        ];
    }
}
