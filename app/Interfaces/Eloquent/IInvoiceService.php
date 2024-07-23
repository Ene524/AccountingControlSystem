<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IInvoiceService extends IEloquentService
{
    public function create(): ServiceResponse;
}
