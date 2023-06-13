<?php

namespace Database\Factories;

use App\Models\OptionsImmo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImmoOptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=OptionsImmo::class;
    public function definition(): array
    {
        return [
            'nomOption' => fake()->sentence(2),
        ];
    }
}
