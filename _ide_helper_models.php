<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $module
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereDeletedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereModule($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereUpdatedAt($value)
 */
	class Category extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|City newModelQuery()
 * @method static Builder|City newQuery()
 * @method static Builder|City query()
 * @method static Builder|City whereCountryId($value)
 * @method static Builder|City whereCreatedAt($value)
 * @method static Builder|City whereDeletedAt($value)
 * @method static Builder|City whereId($value)
 * @method static Builder|City whereName($value)
 * @method static Builder|City whereUpdatedAt($value)
 */
	class City extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $short_title
 * @property int $is_person
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $tax_number
 * @property string|null $identity_number
 * @property string $address
 * @property string $city
 * @property string $town
 * @property string $country
 * @property string|null $tax_office
 * @property string $email
 * @property string $phone
 * @property string|null $fax
 * @property string|null $postal_code
 * @property string|null $web_site
 * @property string|null $commercial_register_number
 * @property string|null $mernis_number
 * @property int|null $e_invoice_status
 * @property int|null $e_archive_status
 * @property int|null $e_dispatch_status
 * @property int|null $e_producer_status
 * @property int|null $e_voucher_status
 * @property string|null $web_service_username
 * @property string|null $web_service_password
 * @property int|null $integrator_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, User> $user
 * @property-read int|null $user_count
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company onlyTrashed()
 * @method static Builder|Company query()
 * @method static Builder|Company whereAddress($value)
 * @method static Builder|Company whereCity($value)
 * @method static Builder|Company whereCommercialRegisterNumber($value)
 * @method static Builder|Company whereCountry($value)
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereDeletedAt($value)
 * @method static Builder|Company whereEArchiveStatus($value)
 * @method static Builder|Company whereEDispatchStatus($value)
 * @method static Builder|Company whereEInvoiceStatus($value)
 * @method static Builder|Company whereEProducerStatus($value)
 * @method static Builder|Company whereEVoucherStatus($value)
 * @method static Builder|Company whereEmail($value)
 * @method static Builder|Company whereFax($value)
 * @method static Builder|Company whereFirstName($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereIdentityNumber($value)
 * @method static Builder|Company whereIntegratorId($value)
 * @method static Builder|Company whereIsPerson($value)
 * @method static Builder|Company whereLastName($value)
 * @method static Builder|Company whereMernisNumber($value)
 * @method static Builder|Company wherePhone($value)
 * @method static Builder|Company wherePostalCode($value)
 * @method static Builder|Company whereShortTitle($value)
 * @method static Builder|Company whereTaxNumber($value)
 * @method static Builder|Company whereTaxOffice($value)
 * @method static Builder|Company whereTitle($value)
 * @method static Builder|Company whereTown($value)
 * @method static Builder|Company whereUpdatedAt($value)
 * @method static Builder|Company whereWebServicePassword($value)
 * @method static Builder|Company whereWebServiceUsername($value)
 * @method static Builder|Company whereWebSite($value)
 * @method static Builder|Company withTrashed()
 * @method static Builder|Company withoutTrashed()
 */
	class Company extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $phone_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country onlyTrashed()
 * @method static Builder|Country query()
 * @method static Builder|Country whereCode($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereDeletedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country wherePhoneCode($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @method static Builder|Country withTrashed()
 * @method static Builder|Country withoutTrashed()
 */
	class Country extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $symbol
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|Currency newModelQuery()
 * @method static Builder|Currency newQuery()
 * @method static Builder|Currency query()
 * @method static Builder|Currency whereCode($value)
 * @method static Builder|Currency whereCreatedAt($value)
 * @method static Builder|Currency whereDeletedAt($value)
 * @method static Builder|Currency whereId($value)
 * @method static Builder|Currency whereIsActive($value)
 * @method static Builder|Currency whereName($value)
 * @method static Builder|Currency whereSymbol($value)
 * @method static Builder|Currency whereUpdatedAt($value)
 */
	class Currency extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property int $company_id
 * @property string $customer_code
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property int $is_person
 * @property int $type
 * @property string $tax_number
 * @property int $tax_office_id
 * @property string $identity_number
 * @property string $phone
 * @property string $fax
 * @property string $mobile_phone
 * @property string $web_site
 * @property string $email
 * @property string $address
 * @property int $city_id
 * @property int $country_id
 * @property string|null $postal_code
 * @property string $specode1
 * @property string $specode2
 * @property string $specode3
 * @property string $note
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer onlyTrashed()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereAddress($value)
 * @method static Builder|Customer whereCityId($value)
 * @method static Builder|Customer whereCompanyId($value)
 * @method static Builder|Customer whereCountryId($value)
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereCustomerCode($value)
 * @method static Builder|Customer whereDeletedAt($value)
 * @method static Builder|Customer whereEmail($value)
 * @method static Builder|Customer whereFax($value)
 * @method static Builder|Customer whereFirstName($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereIdentityNumber($value)
 * @method static Builder|Customer whereIsActive($value)
 * @method static Builder|Customer whereIsPerson($value)
 * @method static Builder|Customer whereLastName($value)
 * @method static Builder|Customer whereMobilePhone($value)
 * @method static Builder|Customer whereNote($value)
 * @method static Builder|Customer wherePhone($value)
 * @method static Builder|Customer wherePostalCode($value)
 * @method static Builder|Customer whereSpecode1($value)
 * @method static Builder|Customer whereSpecode2($value)
 * @method static Builder|Customer whereSpecode3($value)
 * @method static Builder|Customer whereTaxNumber($value)
 * @method static Builder|Customer whereTaxOfficeId($value)
 * @method static Builder|Customer whereTitle($value)
 * @method static Builder|Customer whereType($value)
 * @method static Builder|Customer whereUpdatedAt($value)
 * @method static Builder|Customer whereWebSite($value)
 * @method static Builder|Customer withTrashed()
 * @method static Builder|Customer withoutTrashed()
 */
	class Customer extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Integrators newModelQuery()
 * @method static Builder|Integrators newQuery()
 * @method static Builder|Integrators onlyTrashed()
 * @method static Builder|Integrators query()
 * @method static Builder|Integrators whereCreatedAt($value)
 * @method static Builder|Integrators whereDeletedAt($value)
 * @method static Builder|Integrators whereId($value)
 * @method static Builder|Integrators whereName($value)
 * @method static Builder|Integrators whereUpdatedAt($value)
 * @method static Builder|Integrators whereUrl($value)
 * @method static Builder|Integrators withTrashed()
 * @method static Builder|Integrators withoutTrashed()
 */
	class Integrators extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property int $company_id
 * @property int $customer_id
 * @property int $invoice_type 1=>Sales, 2=>Purchase
 * @property string $invoice_date
 * @property string $invoice_number
 * @property string $due_date
 * @property int $category_id
 * @property int $payment_term_id
 * @property int $currency_id
 * @property string $exchange_rate
 * @property string $gross_total
 * @property string $discount_total
 * @property string $vat_total
 * @property string $charge_total
 * @property string $deduct_total
 * @property string $grand_total
 * @property string $net_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static Builder|Invoice newModelQuery()
 * @method static Builder|Invoice newQuery()
 * @method static Builder|Invoice query()
 * @method static Builder|Invoice whereCategoryId($value)
 * @method static Builder|Invoice whereChargeTotal($value)
 * @method static Builder|Invoice whereCompanyId($value)
 * @method static Builder|Invoice whereCreatedAt($value)
 * @method static Builder|Invoice whereCurrencyId($value)
 * @method static Builder|Invoice whereCustomerId($value)
 * @method static Builder|Invoice whereDeductTotal($value)
 * @method static Builder|Invoice whereDeletedAt($value)
 * @method static Builder|Invoice whereDiscountTotal($value)
 * @method static Builder|Invoice whereDueDate($value)
 * @method static Builder|Invoice whereExchangeRate($value)
 * @method static Builder|Invoice whereGrandTotal($value)
 * @method static Builder|Invoice whereGrossTotal($value)
 * @method static Builder|Invoice whereId($value)
 * @method static Builder|Invoice whereInvoiceDate($value)
 * @method static Builder|Invoice whereInvoiceNumber($value)
 * @method static Builder|Invoice whereInvoiceType($value)
 * @method static Builder|Invoice whereNetTotal($value)
 * @method static Builder|Invoice wherePaymentTermId($value)
 * @method static Builder|Invoice whereUpdatedAt($value)
 * @method static Builder|Invoice whereVatTotal($value)
 */
	class Invoice extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property int $company_id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property string|null $sell_price
 * @property string|null $purchase_price
 * @property int|null $vat
 * @property string|null $barcode
 * @property int|null $can_deduct
 * @property int|null $deduct_rate
 * @property string|null $deduct_code
 * @property string|null $tax_exemption_code
 * @property string|null $specode1
 * @property string|null $specode2
 * @property string|null $specode3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item onlyTrashed()
 * @method static Builder|Item query()
 * @method static Builder|Item whereBarcode($value)
 * @method static Builder|Item whereCanDeduct($value)
 * @method static Builder|Item whereCode($value)
 * @method static Builder|Item whereCompanyId($value)
 * @method static Builder|Item whereCreatedAt($value)
 * @method static Builder|Item whereDeductCode($value)
 * @method static Builder|Item whereDeductRate($value)
 * @method static Builder|Item whereDeletedAt($value)
 * @method static Builder|Item whereDescription($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item whereName($value)
 * @method static Builder|Item wherePurchasePrice($value)
 * @method static Builder|Item whereSellPrice($value)
 * @method static Builder|Item whereSpecode1($value)
 * @method static Builder|Item whereSpecode2($value)
 * @method static Builder|Item whereSpecode3($value)
 * @method static Builder|Item whereTaxExemptionCode($value)
 * @method static Builder|Item whereUpdatedAt($value)
 * @method static Builder|Item whereVat($value)
 * @method static Builder|Item withTrashed()
 * @method static Builder|Item withoutTrashed()
 */
	class Item extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|TaxOffice newModelQuery()
 * @method static Builder|TaxOffice newQuery()
 * @method static Builder|TaxOffice onlyTrashed()
 * @method static Builder|TaxOffice query()
 * @method static Builder|TaxOffice whereCityId($value)
 * @method static Builder|TaxOffice whereCreatedAt($value)
 * @method static Builder|TaxOffice whereDeletedAt($value)
 * @method static Builder|TaxOffice whereId($value)
 * @method static Builder|TaxOffice whereName($value)
 * @method static Builder|TaxOffice whereUpdatedAt($value)
 * @method static Builder|TaxOffice withTrashed()
 * @method static Builder|TaxOffice withoutTrashed()
 */
	class TaxOffice extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Town newModelQuery()
 * @method static Builder|Town newQuery()
 * @method static Builder|Town onlyTrashed()
 * @method static Builder|Town query()
 * @method static Builder|Town whereCityId($value)
 * @method static Builder|Town whereCreatedAt($value)
 * @method static Builder|Town whereDeletedAt($value)
 * @method static Builder|Town whereId($value)
 * @method static Builder|Town whereName($value)
 * @method static Builder|Town whereUpdatedAt($value)
 * @method static Builder|Town withTrashed()
 * @method static Builder|Town withoutTrashed()
 */
	class Town extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $global_code
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Unit newModelQuery()
 * @method static Builder|Unit newQuery()
 * @method static Builder|Unit onlyTrashed()
 * @method static Builder|Unit query()
 * @method static Builder|Unit whereCreatedAt($value)
 * @method static Builder|Unit whereDeletedAt($value)
 * @method static Builder|Unit whereGlobalCode($value)
 * @method static Builder|Unit whereId($value)
 * @method static Builder|Unit whereIsActive($value)
 * @method static Builder|Unit whereName($value)
 * @method static Builder|Unit whereUpdatedAt($value)
 * @method static Builder|Unit withTrashed()
 * @method static Builder|Unit withoutTrashed()
 */
	class Unit extends Eloquent {}
}

namespace App\Models{use Database\Factories\UserFactory;use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Notifications\DatabaseNotification;use Illuminate\Notifications\DatabaseNotificationCollection;use Illuminate\Support\Carbon;use Laravel\Sanctum\PersonalAccessToken;
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property int|null $company_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Company> $companies
 * @property-read int|null $companies_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User onlyTrashed()
 * @method static Builder|User query()
 * @method static Builder|User whereCompanyId($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User withTrashed()
 * @method static Builder|User withoutTrashed()
 */
	class User extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 *
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property int $city_id
 * @property int $town_id
 * @property int $country_id
 * @property string $address
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Warehouse newModelQuery()
 * @method static Builder|Warehouse newQuery()
 * @method static Builder|Warehouse onlyTrashed()
 * @method static Builder|Warehouse query()
 * @method static Builder|Warehouse whereAddress($value)
 * @method static Builder|Warehouse whereCityId($value)
 * @method static Builder|Warehouse whereCompanyId($value)
 * @method static Builder|Warehouse whereCountryId($value)
 * @method static Builder|Warehouse whereCreatedAt($value)
 * @method static Builder|Warehouse whereDeletedAt($value)
 * @method static Builder|Warehouse whereId($value)
 * @method static Builder|Warehouse whereName($value)
 * @method static Builder|Warehouse whereTownId($value)
 * @method static Builder|Warehouse whereUpdatedAt($value)
 * @method static Builder|Warehouse withTrashed()
 * @method static Builder|Warehouse withoutTrashed()
 */
	class Warehouse extends Eloquent {}
}

