<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $title = $this->faker->realText(50);
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'price_start' => $this->faker->randomFloat(2, 0, 100),
            'price_end' => $this->faker->randomFloat(2, 0, 100),
            'short_description' => $this->faker->paragraph,
            'full_description' => $post,
            'image' => '',
        ];
    }
}
