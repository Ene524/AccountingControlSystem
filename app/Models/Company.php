<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'short_title',
        'is_person',
        'first_name',
        'last_name',
        'tax_number',
        'identity_number',
        'address',
        'city_id',
        'town_id',
        'country_id',
        'tax_office_id',
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

    public function users()
    {
        return $this->BelongsToMany(User::class);
    }


}
