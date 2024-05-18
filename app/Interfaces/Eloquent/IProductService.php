<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IProductService extends IEloquentService
{
    public function create(

    ):ServiceResponse;

    public function update(

    ):ServiceResponse;
}
