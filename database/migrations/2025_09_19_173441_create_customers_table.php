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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone',10)->unique();
            $table->string('password');
            $table->date('birthdate')->nullable();
            $table->integer('loyaltyPoints')->default(0);
            $table->enum('loyaltyLevel',['Bronze','Silver','Gold','Platinum'])->default('Bronze');
            $table->text('favoriteDishes')->nullable(); // JSON array of favorite dishes
            $table->foreignId('preferred_branch_id')
                ->nullable()
                ->constrained('branches')
                ->nullOnDelete();
            $table->integer('visitsCount')->default(0);
            $table->datetime('lastVisit')->nullable();
            $table->boolean('marketingOptIn')->default(false);
            $table->rememberToken(); // para mantener sesión
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
