<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'company_id',
        'code',
        'name',
        'description',
        'type',
        'sell_price',
        'purchase_price',
        'unit_id',
        'vat',
        'barcode',
        'is_witholding',
        'witholding_id',
        'tax_exemption_id',
        'tax_id',
        'specode1',
        'specode2',
        'specode3'
    ];
}
