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
        Schema::create('permanent_address', function (Blueprint $table) {
            $table->id('per_address_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('per_house_number')->nullable();
            $table->string('per_street')->nullable();
            $table->string('per_barangay')->nullable();
            $table->string('per_city')->nullable();
            $table->string('per_province')->nullable();
            $table->string('per_region')->nullable();
            $table->string('per_country')->nullable();
            $table->string('per_zip_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permanent_address');
    }
};
