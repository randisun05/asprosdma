<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'body' => $this->faker->paragraph(20),
            'excerpt' => $this->faker->paragraph(1),
            'category_id' => Category::pluck('id')->random(),
            'image' => $this->faker->imageUrl(),
            'document' => $this->faker->url(),
            'member_id' => Member::pluck('id')->random(),
            'status' => $this->faker->randomElement(['submission', 'private']), // Memilih status secara acak
            'publish_at' => $this->faker->dateTimeThisMonth(), // Memastikan tanggal dalam rentang bulan ini
        ];
    }
}
