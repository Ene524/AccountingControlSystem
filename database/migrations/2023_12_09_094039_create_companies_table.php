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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('short_title', 100);
            $table->boolean('is_person');
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('tax_number', 10)->nullable();
            $table->string('identity_number', 11)->nullable();
            $table->string('address', 255);
            $table->string('city',100);
            $table->string('town',100);
            $table->string('country',100);
            $table->string('tax_office')->nullable();
            $table->string('email', 200);
            $table->string('phone', 30);
            $table->string('fax', 30)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('web_site', 100)->nullable();
            $table->string('commercial_register_number', 50)->nullable();
            $table->string('mernis_number', 50)->nullable();
            $table->boolean('e_invoice_status')->default(0)->nullable();
            $table->boolean('e_archive_status')->default(0)->nullable();
            $table->boolean('e_dispatch_status')->default(0)->nullable();
            $table->boolean('e_producer_status')->default(0)->nullable();
            $table->boolean('e_voucher_status')->default(0)->nullable();
            $table->string('web_service_username', 100)->nullable();
            $table->string('web_service_password', 100)->nullable();
            $table->unsignedBigInteger('integrator_id')->nullable();


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
