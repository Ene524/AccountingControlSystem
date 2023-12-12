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
        /* 1: Alıcı, 2: Satıcı, 3: Alıcı ve Satıcı */
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('customer_code', 50);
            $table->string('title', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->boolean('is_person');
            $table->tinyInteger('type');
            $table->string('tax_number', 10);
            $table->unsignedBigInteger('tax_office_id');
            $table->string('identity_number', 11);
            $table->string('phone', 255);
            $table->string('fax', 255);
            $table->string('mobile_phone', 255);
            $table->string('web_site', 255);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('country_id');
            $table->string('postal_code', 10)->nullable();
            $table->string('specode1', 50);
            $table->string('specode2', 50);
            $table->string('specode3', 50);
            $table->string('note', 255);
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();

            //$table->foreign('company_id')->references('id')->on('companies');
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
