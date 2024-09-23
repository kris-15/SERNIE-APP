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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('cycle', ['AUCUN', 'MATERNEL', 'PRIMAIRE', 'SECONDAIRE', 'HUMANITE'])->default('AUCUN');
            $table->enum('salle', ['', 'PREMIERE', 'DEUXIEME', 'TROISIEME', 'QUATRIEME', 'CINQUIEME', 'SIXIEME', 'SEPTIEME', 'HUITIEME'])->default('');
            $table->enum('indice', ['', 'A', 'B', 'C', 'D', 'E', 'F'])->default('')->nullable(true);
            $table->enum('niveau', ['', '1', '2', '3', '4', '5', '6', '7', '8'])->default('');
            $table->foreignId('section_id')->constrained()->onDelete('cascade')->nullable(true);
            $table->foreignId('ecole_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
