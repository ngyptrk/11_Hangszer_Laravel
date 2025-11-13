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
        Schema::table('products', function (Blueprint $table) {
            // Egyedi index a name mezőre
            $table->unique('name', 'products_name_unique');

            // Új logikai oszlop hozzáadása
            $table->boolean('is_published2')->default(false);

            // A category mező hosszának módosítása 200 karakterre
            $table->string('category', 200)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Egyedi index eltávolítása (a nevével)
            $table->dropUnique('products_name_unique');

            // Az új oszlop törlése
            $table->dropColumn('is_published2');

            // A category mező hosszának visszaállítása az eredetire
            $table->string('category', 255)->change();
        });
    }
};
