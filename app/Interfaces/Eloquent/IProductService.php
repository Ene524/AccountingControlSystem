<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IProductService extends IEloquentService
{
    public function create(
        int     $company_id,
        string  $code,
        string  $name,
        string  $description,
        int     $type,
        ?float  $sell_price,
        ?float  $purchase_price,
        ?int    $unit_id,
        ?int    $vat,
        ?string $barcode,
        ?bool   $is_witholding,
        ?int    $witholding_id,
        ?int    $tax_exemption_id,
        ?int    $tax_id,
        ?string $specode1,
        ?string $specode2,
        ?string $specode3
    ): ServiceResponse;


    public function update(
        int     $id,
        string  $code,
        string  $name,
        string  $description,
        int     $type,
        ?float  $sell_price,
        ?float  $purchase_price,
        ?int    $unit_id,
        ?int    $vat,
        ?string $barcode,
        ?bool   $is_witholding,
        ?int    $witholding_id,
        ?int    $tax_exemption_id,
        ?int    $tax_id,
        ?string $specode1,
        ?string $specode2,
        ?string $specode3
    ): ServiceResponse;
}
