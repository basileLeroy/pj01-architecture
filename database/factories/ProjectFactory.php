<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Project::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => "Project One",
            "slug" => "project-one",
            "cover" => "images/templates/dummy.png",
            "gallery" => ["images/templates/dummy.png","images/templates/dummy.png","images/templates/dummy.png"],
            "description" => fake()->text(),
            "language" => "en",
            "title" => "Project One"
        ];
    }
}
