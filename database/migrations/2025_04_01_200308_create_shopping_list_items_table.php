<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateShoppingListItemsTable
 *
 * Cette migration crée la table 'shopping_list_items' qui gère les éléments des listes de courses.
 * Chaque élément est associé à une liste de courses spécifique et à un ingrédient particulier.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'shopping_list_items'.
     *
     * La méthode crée la table contenant les éléments des listes de courses, incluant la référence à la liste de courses,
     * l'ingrédient, la quantité et l'état de l'élément (si acheté ou non).
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('shopping_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id')->constrained()->onDelete('cascade');
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
            $table->string('quantity')->nullable(); // Quantité de l'ingrédient (ex: "500g", "2 unités")
            $table->boolean('checked')->default(false); // État de l'élément : true si acheté, false sinon
        });
    }

    /**
     * Annule la migration en supprimant la table 'shopping_list_items'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_list_items');
    }
};
