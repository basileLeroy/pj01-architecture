<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "project_name" => fake()->text(15),
            "project_image" => "images/templates/dummy.png",
            "project_gallery" => '["images/templates/dummy.png","images/templates/dummy.png","images/templates/dummy.png"]',
            "description" => fake()->text(),
            "language" => "en",
            "title" => fake()->slug(4)
        ];
    }
}