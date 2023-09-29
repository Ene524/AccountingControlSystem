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
            $table->string('short_name');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('address');
            $table->string('city_id');
            $table->string('town_id');
            $table->string('country_id');
            $table->string('tax_office');
            $table->string('tax_number');
            $table->string('ispercompany');
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
