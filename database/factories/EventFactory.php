<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'slug' => \Illuminate\Support\Str::slug($this->faker->sentence()),
            'body' => $this->faker->paragraph(2),
            'date' => $this->faker->dateTimeThisMonth(),
            'enddate' => $this->faker->dateTimeThisMonth(),
            'place' => $this->faker->city(),
            'link'=> $this->faker->url(),
            'participant'  => $this->faker->numberBetween(0, 10),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['active', 'closed']),
        ];
    }
}
