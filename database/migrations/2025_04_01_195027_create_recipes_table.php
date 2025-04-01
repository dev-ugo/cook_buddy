<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateRecipesTable
 *
 * Cette migration crée la table 'recipes' dans la base de données, qui contient des informations
 * sur les recettes, y compris l'auteur, le titre, la description, le temps de préparation et de cuisson,
 * la difficulté, et l'image associée.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'recipes'.
     *
     * La méthode crée la table avec les colonnes nécessaires pour stocker les informations des recettes.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('prep_time');
            $table->integer('cook_time');
            $table->string('difficulty');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Annule la migration en supprimant la table 'recipes'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
