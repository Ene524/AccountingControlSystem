<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'is_person',
        'customer_code',
        'title',
        'first_name',
        'last_name',
        'tax_number',
        'identity_number',
        'phone',
        'fax',
        'mobile_phone',
        'web_site',
        'email',
        'address',
        'city',
        'town',
        'country',
        'tax_office',
        'postal_code',
        'specode1',
        'specode2',
        'specode3',
        'note',
        'is_active',
    ];
}
