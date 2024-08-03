<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IInvoiceService extends IEloquentService
{
    public function create(
        int $company_id,
        int $customer_id,
        int $invoice_type,
        date $invoice_date,
        string $invoice_number,


    ): ServiceResponse;
}
