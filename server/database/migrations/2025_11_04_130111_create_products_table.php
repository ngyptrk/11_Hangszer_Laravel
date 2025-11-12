<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Megcsinálja
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->primary('id');
            $table->string('name', 191)->notNull()->default(null);
            $table->text('description')->notNull()->default(null);
            $table->string('brand', 255)->notNull()->default(null);
            $table->Integer('price')->notNull()->default(null);
            $table->Integer('quantity')->notNull()->default(null);
            //Minta mezők

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
