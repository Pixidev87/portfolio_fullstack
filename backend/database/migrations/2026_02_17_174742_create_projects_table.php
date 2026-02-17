<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // létrehozza a 'projects' táblát a szükséges mezőkkel
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // projekt címe
            $table->string('slug'); // egyedi azonosító a URL-ben
            $table->text('description')->nullable(); // rövid leírás
            $table->text('content')->nullable(); // részletes leírás
            $table->string('image_url')->nullable(); // projekt képének URL-je
            $table->string('github_url')->nullable(); // GitHub repository URL-je
            $table->boolean('featured')->default(false); // kiemelt projekt jelzője
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
