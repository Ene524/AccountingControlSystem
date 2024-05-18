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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('code', 50);
            $table->string('name', 200);
            $table->string('description', 255)->nullable();
            $table->decimal('sell_price', 10, 2)->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->tinyInteger('vat')->nullable();
            $table->string('barcode', 50)->nullable()->nullable();
            $table->boolean('can_deduct')->default(0)->nullable();
            $table->string('deduct_id')->nullable();
            $table->unsignedBigInteger('tax_exemption_id')->nullable();
            $table->string('specode1', 50)->nullable();
            $table->string('specode2', 50)->nullable();
            $table->string('specode3', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('tax_exemption_id')->references('id')->on('tax_exemption_codes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
