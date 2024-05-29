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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_primary")->default(false);
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('author');
            $table->string("cover")->nullable();
            $table->longText('content');
            $table->string('language');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->integer("index")->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
