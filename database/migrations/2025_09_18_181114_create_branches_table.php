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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('logoUrl')->nullable();
            $table->string('coverimageUrl')->nullable();
            $table->string('phone',16);
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('street',64)->nullable();
            $table->string('interiorNumber',4)->nullable();
            $table->string('exteriorNumber',4)->nullable();
            $table->string('colony')->nullable();
            $table->string('statedId',32)->nullable();
            $table->string('postalCode',8)->nullable();
            //aqui iran los ide de suscripción y usuario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
