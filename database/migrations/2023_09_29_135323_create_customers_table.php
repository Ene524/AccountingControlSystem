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
            $table->string('short_name', 30);
            $table->string('full_name', 200);
            $table->string('email', 100);
            $table->string('phone', 12);
            $table->string('fax', 12);
            $table->string('address', 255);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('tax_office_id');
            $table->string('tax_number', 11);
            $table->boolean('is_person');
            $table->boolean('is_active');
            $table->boolean('is_create_balance');
            $table->decimal('is_creating_balance_amount', 10, 2);
            $table->timestamps();
            $table->softDeletes();
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
