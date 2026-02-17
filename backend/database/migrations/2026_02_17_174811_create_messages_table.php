<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        // létrehozza a 'messages' táblát a szükséges mezőkkel
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // üzenetküldő neve
            $table->string('email'); // üzenetküldő email címe
            $table->string('subject'); // üzenet tárgya
            $table->text('message'); // üzenet tartalma
            $table->boolean('is_read')->default(false); // olvasott jelző
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
