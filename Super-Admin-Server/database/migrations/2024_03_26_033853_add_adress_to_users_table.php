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
        Schema::table('users', function (Blueprint $table) {
            $table->string('per_house_number')->nullable();
            $table->string('per_street')->nullable();
            $table->string('per_barangay')->nullable();
            $table->string('per_city')->nullable();
            $table->string('per_province')->nullable();
            $table->string('per_region')->nullable();
            $table->string('per_country')->nullable();
            $table->string('per_zip_code')->nullable();
            $table->string('cur_house_number')->nullable();
            $table->string('cur_street')->nullable();
            $table->string('cur_barangay')->nullable();
            $table->string('cur_city')->nullable();
            $table->string('cur_province')->nullable();
            $table->string('cur_region')->nullable();
            $table->string('cur_country')->nullable();
            $table->string('cur_zip_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
