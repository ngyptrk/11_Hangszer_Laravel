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
        //A meglévőt módosítja
        Schema::table('products', function (Blueprint $table) {
            //Egyedi indexet teszek a name mezőre
            $table->unique('name', 'products_name_unique');
            //Beteszek egy új oszlopot

            //Módosítom a mező méretét
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Nem törli le
        Schema::table('products', function (Blueprint $table) {
            // Eltávolítja az egyedi indexet az 'email' oszlopról
            $table->dropUnique(['name']);
            // VAGY az index nevével:
            // $table->dropUnique('products_name_unique');

            // 2. A string oszlop méretének visszaállítása az eredeti 100-ra
            // (Az "posts" tábla eredeti oszlop mérete feltételezve: 100)

        });
    }
};
