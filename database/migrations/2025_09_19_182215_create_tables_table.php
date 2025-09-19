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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')
                ->constrained()
                ->onDelete('cascade');
            $table->enum('tableType',['Standard','Booth','Outdoor','Bar','Private']);
            $table->integer('SeatCount');
            $table->string('imageUrl',64)->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');  //para el empleado que atendera la mesa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
