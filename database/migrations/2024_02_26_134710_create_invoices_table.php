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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('customer_id');
            $table->tinyInteger('invoice_type')->comment('1=>Sales, 2=>Purchase');
            $table->dateTime('invoice_date');
            $table->string('invoice_number',16);
            $table->date('invoice_date');
            $table->date('due_date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('payment_term_id');
            $table->unsignedBigInteger('currency_id');
            $table->decimal('exchange_rate', 8, 8)->default(1);
            $table->decimal('gross_total', 15, 6);
            $table->decimal('discount_total', 15, 6)->default(0);
            $table->decimal('vat_total', 15, 6)->default(0);
            $table->decimal('charge_total', 15, 6)->default(0);
            $table->decimal('deduct_total', 15, 6)->default(0);
            $table->decimal('grand_total', 15, 6);
            $table->decimal('net_total', 15, 6);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
