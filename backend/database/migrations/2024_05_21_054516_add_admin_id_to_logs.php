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
        Schema::table('logs', function (Blueprint $table) {
            $table->unsignedBigInteger('admin_id')->nullable();
            //admin_id = your preffered name. admin_id = the primary key on admin table.
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logs', function (Blueprint $table) {
            //
        });
    }
};
