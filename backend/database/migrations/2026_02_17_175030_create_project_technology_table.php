<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // létrehozza a 'project_technology' pivot táblát a projektek és technológiák közötti kapcsolat kezelésére
        Schema::create('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id'); // idegen kulcs a 'projects' táblára
            $table->unsignedBigInteger('technology_id'); // idegen kulcs a 'technologies' táblára
            $table->primary(['project_id', 'technology_id']); // összetett elsődleges kulcs a két idegen kulcsból

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); // idegen kulcs kapcsolat a 'projects' táblával, kaskádolva törlés esetén
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade'); // idegen kulcs kapcsolat a 'technologies' táblával, kaskádolva törlés esetén

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
