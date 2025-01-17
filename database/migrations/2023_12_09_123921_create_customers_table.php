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
            $table->boolean('is_person');
            $table->string('code', 50);
            $table->string('title', 255);
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('tax_number', 10)->nullable();
            $table->string('identity_number', 11)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('mobile_phone', 255)->nullable();
            $table->string('web_site', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city',100)->nullable();
            $table->string('town',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('tax_office')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('specode1', 50)->nullable();
            $table->string('specode2', 50)->nullable();
            $table->string('specode3', 50)->nullable();
            $table->string('note', 255)->nullable();
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
