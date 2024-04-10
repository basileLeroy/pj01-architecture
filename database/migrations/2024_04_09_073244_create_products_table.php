<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->text('article_content');
            $table->text('author')->nullable();
            $table->text('published');
            $table->text('publisher')->nullable();
            $table->text('url')->nullable();
            $table->text('currency');
            $table->timestamps();
            $table->string('language');
            $table->string('page');
            $table->string('language_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
