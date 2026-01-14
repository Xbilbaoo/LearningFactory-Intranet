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
        Schema::create('material_zeregin', function (Blueprint $table) {

            // Bi tauletatik foreign key-ak hartu
            $table->foreignId('materialID')->constrained('materialas', 'materialID')->onDelete('restrict');
            $table->foreignId('zereginID')->constrained('zereginID', 'zereginas')->onDelete('cascade');
            $table->unsignedInteger('kantitatea');

            // Primary Key-a ezarri
            $table->primary(['materialID', 'zereginID']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_zeregin');
    }
};
