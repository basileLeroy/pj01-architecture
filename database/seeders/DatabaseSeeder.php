<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Project;
use App\Models\User;
use App\Models\Word;
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
        Word::factory()->create([
            "is_primary" => true,
            "title"=>"Words",
            "slug" => "words-by-marc",
            "content" => "No content available for now.",
            "language" => "en"
        ]);
        Word::factory()->create([
            "is_primary" => true,
            "title"=>"Words",
            "slug" => "words-by-marc",
            "content" => "Pas de contenu disponible pour le moment",
            "language" => "fr"
        ]);
        Word::factory()->create([
            "is_primary" => true,
            "title"=>"Words",
            "slug" => "words-by-marc",
            "content" => "Geen inhoud beschikbaar op dit moment",
            "language" => "nl"
        ]);
    }
}
