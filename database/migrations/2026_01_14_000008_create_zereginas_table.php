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
        Schema::create('zereginas', function (Blueprint $table) {
            $table->id("zereginID");
            $table->string("izena", 200);
            $table->text("deskribapena");
            $table->unsignedInteger("estimazioa");
            $table->date("hasieraData");
            $table->date("amaieraData");
            $table->unsignedInteger("zereginPosizioa");
            $table->enum("status", ['Pendiente', 'Abian', 'Eginda'])->default('Pendiente');
            $table->foreignId("taldeID")->constrained("taldeas", "taldeID")->onDelete("restrict");
            $table->foreignId("arduradunID")->constrained("arduradunas", "arduradunID")->onDelete("restrict");
            $table->foreignId("faseID")->constrained("faseas", "faseID")->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zereginas');
    }
};
