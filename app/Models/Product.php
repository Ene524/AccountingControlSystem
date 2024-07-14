<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function witholdings()
    {
        return $this->belongsTo(WitholdingCode::class, 'witholding_id');
    }

    public function tax_exemptions()
    {
        return $this->belongsTo(TaxExemptionCode::class, 'tax_exemption_id');
    }

    public function taxes()
    {
        return $this->belongsTo(TaxCode::class, 'tax_id');
    }


}
