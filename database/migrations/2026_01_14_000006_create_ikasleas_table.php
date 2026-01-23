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
        Schema::create('ikasleas', function (Blueprint $table) {
            $table->id("ikasleID");
            $table->string("izena", 100);
            $table->string("abizena", 100);
            $table->foreignId("taldeID")->constrained("taldeas", "taldeID")->onDelete("restrict");
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikasleas');
    }
};
