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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('customer_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('user_id') // empleado que toma la orden
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('table_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('area_id')
                ->constrained()
                ->onDelete('cascade');
            $table->enum('orderStatus',['ordered','sentToKitchen','inPreparation','readyToServe','served','outForDelivery','pickedUp'])
                ->default('ordered');
            $table->enum('orderType',['pickup','dineIn','delivery'])
                ->default('dineIn');
            $table->float('discount',8,2)->default(0);
            $table->float('taxtAmount',8,2)->default(0);
            $table->enum('paymentMethod',['cash','creditCard','debitCard','mobilePayment','other'])
                ->default('cash');
            $table->float('total',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
