<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->numberBetween(10000, 99999),
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'password' => $this->faker->unique()->password(),
            'nomember' => $this->faker->unique()->numberBetween(10000, 99999),
        ];
    }
}
