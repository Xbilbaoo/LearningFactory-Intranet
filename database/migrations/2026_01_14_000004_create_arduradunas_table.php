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
        Schema::create('arduradunas', function (Blueprint $table) {
            $table->id("arduradunID");
            $table->string("izena", 100);
            $table->string("abizena", 100);
            $table->string("email", 100)->unique();
            $table->string("pasahitza", 255);
            $table->enum("Rola", ["Arduraduna", "Admin"])->default("Arduraduna");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arduradunas');
    }
};
