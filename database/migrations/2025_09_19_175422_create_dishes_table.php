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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('imageUrl')->nullable();
            $table->decimal('price', 8, 2);
            $table->enum('portionUnitMeasure',['gr','kg','ml','l','unit']);
            $table->string('portionContent',16);
            $table->enum('status',['available','unavailable','seasonal'])->default('available');
            $table->boolean('isVegan')->default(false);
            $table->boolean('isGlutenFree')->default(false);
            $table->integer('spicyLevel')->default(0);
            $table->integer('calories')->nullable();
            $table->integer('proteinGrams')->NULLable();
            $table->integer('carbsGrams')->nullable();
            $table->integer('fatsGrams')->nullable();
            $table->integer('preparationTimeMinutes')->nullable();
            $table->integer('popularityScore')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
