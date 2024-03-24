<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchan>
 */
class MerchanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'subtitle' => $this->faker->sentence(),
            'color' => $this->faker->randomElement(['red', 'yellow']),
            'price' => $this->faker->numberBetween(100, 10000000),
            'body'  => $this->faker->paragraph(5),
            'image' => $this->faker->imageUrl(),
            'how' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['active', 'non-active']),
        ];
    }
}
