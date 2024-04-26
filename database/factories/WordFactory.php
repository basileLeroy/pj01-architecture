<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Word>
 */
class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title =  fake()->word(2);
        return [
            "is_primary" => false,
            "title" => $title,
            "slug" => Str::slug($title),
            "author" => "Marc Belderbos",
            "cover" => asset("no_image.jpg"),
            "content" => __('error.no_content'),
            "language" => app()->getLocale(),
        ];
    }
}
