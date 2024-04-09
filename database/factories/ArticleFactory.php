<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->text(15),
            "slug" => fake()->slug(5),
            "article_content" => fake()->text(),
            "language" => "en",
            "page" => fake()->word(),
            "image"=> 'images/templates/dummy.png',
            "article_image" => 'images/templates/dummy.png',
            "language_title" => fake()->text(15)
        ];
    }
}
