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
        Schema::create('Electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('NumeroCarteElecteur')->unique();
            $table->string('CIN')->unique();
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('DateNaissance');
            $table->string('BureauVote');
            $table->string('LieuDeNaissance');
            $table->enum('Sexe',['Feminin', 'Masculin']);
            $table->string('Commune');
            $table->unsignedBigInteger('IDFichier'); // ✅ Doit correspondre au type de id de FichierElectoral
            $table->timestamps();

            $table->foreign('IDFichier')->references('id')->on('FichierElectoral')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};