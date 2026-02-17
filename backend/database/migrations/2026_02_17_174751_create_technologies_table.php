<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // létrehozza a 'technologies' táblát a szükséges mezőkkel
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // technológia neve
            $table->string('icon')->nullable(); // ikon URL-je vagy osztálya
            $table->string('category')->nullable(); // kategória (pl. frontend, backend, stb.)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};
