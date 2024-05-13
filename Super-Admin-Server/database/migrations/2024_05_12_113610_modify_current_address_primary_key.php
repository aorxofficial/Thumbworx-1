<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCurrentAddressPrimaryKey extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('current_address', function (Blueprint $table) {
            $table->renameColumn('id', 'cur_address_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('current_address', function (Blueprint $table) {
            $table->renameColumn('cur_address_id', 'id');
        });
    }
}
