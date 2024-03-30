<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'title',
        'short_title',
        'is_person',
        'first_name',
        'last_name',
        'tax_number',
        'identity_number',
        'address',
        'city',
        'town',
        'country',
        'tax_office',
        'email',
        'phone',
        'fax',
        'postal_code',
        'web_site',
        'commercial_register_number',
        'mernis_number',
        'e_invoice_status',
        'e_archive_status',
        'e_dispatch_status',
        'e_producer_status',
        'e_voucher_status',
        'web_service_username',
        'web_service_password',
        'integrator_id'
    ];

    public function user()
    {
        //->wherePivot('deleted_at',null);
        return $this->belongsToMany(User::class)->withTimestamps();
    }


}
