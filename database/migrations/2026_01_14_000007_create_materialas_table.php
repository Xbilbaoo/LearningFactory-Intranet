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
        Schema::create('materialas', function (Blueprint $table) {
            $table->id("materialID");
            $table->string("izena", 100);
            $table->text("deskribapena");
            $table->unsignedInteger("stock");

            // Hornitzailearen ID-a FK moduan ezarri
            $table->foreignId("hornitzaileID")->constrained("hornitzaileas", "hornitzaileID")->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialas');
    }
};
