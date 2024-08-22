<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;
use DateTime;

interface IInvoiceService extends IEloquentService
{
    public function create(
        int      $company_id,
        int      $customer_id,
        int      $invoice_type,
        DateTime $invoice_date,
        string   $invoice_number,
        ?DateTime $due_date,
        ?int      $category_id,
        ?int      $currency_id,
        ?float    $exchange_rate,
        float    $gross_total,
        float     $discount_total,
        float     $vat_total,
        float     $charge_total,
        float     $deduct_total,
        float    $grand_total,
        float     $net_total,
        mixed     $invoice_lines
    ): ServiceResponse;


}
