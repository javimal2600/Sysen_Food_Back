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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('dish_id')
                ->constrained()
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->float('unit_price',8,2);
            $table->float('discount',8,2)->nullable();
            $table->float('subtotal',8,2);
            $table->string('notes')->nullable();
            $table->enum('status',['pending','inPreparation','readyToServe','served','cancelled'])
                ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
