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
        Schema::create('setting_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')
                ->constrained()
                ->onDelete('cascade');
            $table->integer('resserveTimeoutHours');
            $table->enum('theme', ['light', 'dark'])->default('light');
            $table->string('primaryColor', 7)->default('#FFFFFF');
            $table->string('secondaryColor', 7)->default('#000000');
            $table->string('textColor', 7)->default('#000000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_branches');
    }
};
