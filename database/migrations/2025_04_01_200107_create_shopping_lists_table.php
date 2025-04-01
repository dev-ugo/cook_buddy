<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateShoppingListsTable
 *
 * Cette migration crée la table 'shopping_lists' qui permet de stocker les listes de courses
 * associées à un utilisateur. Chaque liste de courses est liée à un utilisateur spécifique.
 */
return new class extends Migration
{
    /**
     * Exécute la migration pour créer la table 'shopping_lists'.
     *
     * La méthode crée la table contenant les informations des listes de courses, y compris
     * l'identifiant de l'utilisateur et le titre de la liste.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Annule la migration en supprimant la table 'shopping_lists'.
     *
     * Cette méthode est appelée lors du rollback de la migration.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_lists');
    }
};
