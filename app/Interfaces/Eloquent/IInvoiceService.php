<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;
use App\Models\Invoice;
use DateTime;
use Exception;

interface IInvoiceService extends IEloquentService
{
    public function create(
        int      $company_id,
        int      $customer_id,
        int      $invoice_type,
        DateTime $invoice_date,
        string   $invoice_number,
        DateTime $due_date,
        int      $category_id,
        int      $currency_id,
        float    $exchange_rate,
        float    $gross_total,
        float    $discount_total = 0,
        float    $vat_total = 0,
        float    $charge_total = 0,
        float    $deduct_total = 0,
        float    $grand_total,
        float    $net_total
    ): ServiceResponse;
}
