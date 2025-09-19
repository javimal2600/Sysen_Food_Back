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
        Schema::create('dish_ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('ingredient_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('name');
            $table->float('price',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_ingredients');
    }
};
