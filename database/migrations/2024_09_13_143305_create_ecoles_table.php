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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->enum('denomination', ['ECOLE','ECOLE PRIMAIRE', 'COLLEGE', 'LYCEE', 'INSTITUT', 'COMPLEXE SCOLAIRE', 'GROUPE SCOLAIRE'])->default('ECOLE');
            $table->string('nom');
            $table->enum('type', ['NON DEFINI','PUBLIC','PRIVEE'])->default('NON DEFINI');
            $table->string('adresse');
            $table->foreignId('directeur_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};
