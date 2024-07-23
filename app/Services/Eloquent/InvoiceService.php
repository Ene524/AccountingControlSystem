<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IInvoiceService;
use App\Models\Invoice;

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

    public function create(): ServiceResponse
    {
        // TODO: Implement create() method.
    }
}
