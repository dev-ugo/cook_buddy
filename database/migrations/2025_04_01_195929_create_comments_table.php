<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCommentsTable
 *
 * Cette migration crée la table 'comments' qui permet de stocker les commentaires des utilisateurs
 * sur les recettes. Chaque commentaire est associé à un utilisateur et une recette spécifiques.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'comments'.
     *
     * La méthode crée la table qui contient les commentaires, associant chaque commentaire
     * à un utilisateur et à une recette spécifique.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Annule la migration en supprimant la table 'comments'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
