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
        Schema::table('driver', function (Blueprint $table) {
            $table->string('contact_person');
            $table->string('contact_person_relationship');
            $table->string('contact_person_phone_number');
            $table->string('contact_person_email');
            $table->string('contact_person_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('driver', function (Blueprint $table) {
            $table->dropColumn([
                'contact_person',
                'contact_person_relationship',
                'contact_person_phone_number',
                'contact_person_email',
                'contact_person_address',
            ]);
        });
    }
};
