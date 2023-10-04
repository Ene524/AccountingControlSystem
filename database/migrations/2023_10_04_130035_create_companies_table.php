<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->boolean('is_person');
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('tax_number', 10);
            $table->string('identity_number', 11);
            $table->string('address', 255);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('tax_office_id');
            $table->string('email', 200);
            $table->string('phone', 30);
            $table->string('fax', 30);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
