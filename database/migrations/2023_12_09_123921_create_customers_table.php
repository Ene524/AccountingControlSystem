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
            $table->unsignedBigInteger('company_id');
            $table->string('customer_code', 50);
            $table->string('title', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->boolean('is_person');
            $table->string('tax_number', 10);
            $table->string('identity_number', 11);
            $table->string('phone', 255);
            $table->string('fax', 255);
            $table->string('mobile_phone', 255);
            $table->string('web_site', 255);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->string('city',100);
            $table->string('town',100);
            $table->string('country',100);
            $table->string('tax_office')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('specode1', 50);
            $table->string('specode2', 50);
            $table->string('specode3', 50);
            $table->string('note', 255);
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
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
