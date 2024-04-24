<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Web Admin',
            'slug' => 'web-admin',
            'email' => 'basile2105@gmail.com',
            'password' => Hash::make("adminww00rd"),
        ]);

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
            "page"=>"home",
            "language" => "fr"
        ]);
        Article::factory()->create([
            "page"=>"home",
            "language" => "nl"
        ]);
        Article::factory()->create([
            "page"=>"intentions-site",
            "language" => "en"
        ]);
        Article::factory()->create([
            "page"=>"intentions-site",
            "language" => "fr"
        ]);
        Article::factory()->create([
            "page"=>"intentions-site",
            "language" => "nl"
        ]);
        Article::factory()->create([
            "page"=>"intentions-projects",
            "language" => "en"
        ]);
        Article::factory()->create([
            "page"=>"intentions-projects",
            "language" => "fr"
        ]);
        Article::factory()->create([
            "page"=>"intentions-projects",
            "language" => "nl"
        ]);
    }
}
