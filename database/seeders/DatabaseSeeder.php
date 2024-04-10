<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Project::factory()->create([
            "language" => "en"
        ]);
        Project::factory()->create([
            "language" => "fr"
        ]);
        Project::factory()->create([
            "language" => "nl"
        ]);
        Article::factory()->create([
            "page"=>"home",
            "language" => "en"
        ]);
        Article::factory()->create([
            "language" => "fr"
        ]);
        Article::factory()->create([
            "language" => "nl"
        ]);
    }
}
