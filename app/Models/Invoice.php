<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'invoice_date' => 'datetime',
        'due_date' => 'datetime',
    ];
    protected $fillable = [
        'company_id',
        'customer_id',
        'invoice_type',
        'invoice_date',
        'invoice_number',
        'due_date',
        'category_id',
        'currency_id',
        'exchange_rate',
        'gross_total',
        'discount_total',
        'vat_total',
        'charge_total',
        'deduct_total',
        'grand_total',
        'net_total',
    ];

    public function invoiceLines()
    {
        return $this->hasMany(InvoiceLine::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
