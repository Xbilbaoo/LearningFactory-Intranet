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
        Schema::create('hornitzaileas', function (Blueprint $table) {
            $table->id("hornitzaileID");
            $table->string("izena", 100);
            $table->string("cif", 50);
            $table->string("email", 100)->unique();
            $table->text("helbidea");
            $table->string("telefonoa", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hornitzaileas');
    }
};
