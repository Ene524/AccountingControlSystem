<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IInvoiceService;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use DateTime;

class InvoiceService implements IInvoiceService
{

    public function getAll(): ServiceResponse
    {
        $invoices = Invoice::where('company_id', auth()->user()->company_id)->get();
        return new ServiceResponse(true, "Faturalar getirildi", $invoices, 200);
    }

    public function getById(int $id): ServiceResponse
    {
        $invoice = Invoice::find($id);
        if ($invoice) {
            return new ServiceResponse(true, "Fatura getirildi", $invoice, 200);
        } else {
            return new ServiceResponse(false, "Fatura bulunamadı", null, 404);

        }
    }

    public function delete(int $id): ServiceResponse
    {
        $invoice = $this->getById($id)->getData();
        if ($invoice) {
            $invoice->delete();
            return new ServiceResponse(true, "Fatura silindi", null, 200);
        } else {
            return new ServiceResponse(false, "Fatura bulunamadı", null, 404);

        }
    }

    public function create(
        int      $company_id,
        int      $customer_id,
        int      $invoice_type,
        DateTime $invoice_date,
        string   $invoice_number,
        ?DateTime $due_date,
        ?int      $category_id,
        ?int      $currency_id,
        ?float    $exchange_rate,
        float    $gross_total,
        float     $discount_total,
        float     $vat_total,
        float     $charge_total,
        float     $deduct_total,
        float    $grand_total,
        float     $net_total,
        mixed     $invoice_lines
    ): ServiceResponse
    {

        $invoice = Invoice::create([
            'company_id' => $company_id,
            'customer_id' => $customer_id,
            'invoice_type' => $invoice_type,
            'invoice_date' => $invoice_date,
            'invoice_number' => $invoice_number,
            'due_date' => $due_date,
            'category_id' => $category_id,
            'currency_id' => $currency_id,
            'exchange_rate' => $exchange_rate,
            'gross_total' => $gross_total,
            'discount_total' => $discount_total,
            'vat_total' => $vat_total,
            'charge_total' => $charge_total,
            'deduct_total' => $deduct_total,
            'grand_total' => $grand_total,
            'net_total' => $net_total,
        ]);


        $invoice_lines = json_decode($invoice_lines, true);


        foreach ($invoice_lines as $line) {

            InvoiceLine::create([
                'invoice_id' => $invoice->id,
                'product_id' => $line['product_id'],
                'quantity' => $line['quantity'],
                'vat' => $line['vat'],
                'price' => $line['price'],
                'total' => $line['total'],
            ]);
        }

        return new ServiceResponse(
            true,
            'Invoice created successfully',
            $invoice,
            200
        );

    }
}