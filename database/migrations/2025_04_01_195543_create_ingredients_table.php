<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateIngredientsTable
 *
 * Cette migration crée la table 'ingredients' dans la base de données, qui contient les informations
 * sur les ingrédients utilisés dans les recettes, y compris leur nom unique.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'ingredients'.
     *
     * La méthode crée la table avec les colonnes nécessaires pour stocker les informations des ingrédients.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name')->unique(); // Nom unique de l'ingrédient
            $table->timestamps(); // Colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Annule la migration en supprimant la table 'ingredients'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
