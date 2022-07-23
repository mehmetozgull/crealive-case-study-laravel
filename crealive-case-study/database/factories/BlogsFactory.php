<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(3);
        return [
            "category_id" => rand(1, 8),
            "name" => $title,
            "image" => $this->faker->imageUrl(750, 520, 'nature', true, 'Crealive Case Study'),
            "text" => $this->faker->paragraph(250),
            "name_seo" => Str::slug($title),
        ];
    }
}
