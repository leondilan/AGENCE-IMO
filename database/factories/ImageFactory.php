<?php

namespace Database\Factories;

use App\Models\ImageImmo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=ImageImmo::class;
    public function definition(): array
    {
        return [
            'nomImage' => 'imo3.jpg',
            'idBiens' => fake()->numberBetween(1,50),
        ];
    }
}
