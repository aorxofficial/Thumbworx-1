<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAddressColumnsFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'per_house_number',
                'per_street',
                'per_barangay',
                'per_city',
                'per_province',
                'per_region',
                'per_country',
                'per_zip_code',
                'cur_house_number',
                'cur_street',
                'cur_barangay',
                'cur_city',
                'cur_province',
                'cur_region',
                'cur_country',
                'cur_zip_code',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you want to reverse the operation, you can recreate the columns here.
    }
}
