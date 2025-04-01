<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateRecipeIngredientTable
 *
 * Cette migration crée la table pivot 'recipe_ingredient' qui gère la relation many-to-many
 * entre les recettes et les ingrédients. Elle stocke les identifiants des recettes, des ingrédients,
 * ainsi que la quantité de chaque ingrédient utilisé dans chaque recette.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'recipe_ingredient'.
     *
     * La méthode crée une table pivot qui relie les recettes et les ingrédients,
     * en incluant les informations sur la quantité de chaque ingrédient.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
            $table->string('quantity'); // Quantité de l'ingrédient (ex: "200g", "2 pièces")
        });
    }

    /**
     * Annule la migration en supprimant la table 'recipe_ingredient'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_ingredient');
    }
};
