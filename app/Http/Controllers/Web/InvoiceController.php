<?php

namespace App\Http\Controllers\Web;

use _PHPStan_27631a2e0\Nette\Utils\DateTime;
use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\InvoiceController\CreateRequest;
use App\Interfaces\Eloquent\ICommonService;
use App\Interfaces\Eloquent\IInvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use HttpResponse;
    private IInvoiceService $invoiceService;
    private ICommonService $commonService;

    public function __construct(IInvoiceService $invoiceService, ICommonService $commonService)
    {
        $this->invoiceService = $invoiceService;
        $this->commonService = $commonService;
    }
    public function index()
    {
        return view('modules.invoice.index.index');
    }
    public function getInvoices()
    {
        $response = $this->invoiceService->getAll();

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
    public function create()
    {
        return view('modules.invoice.create.index');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $response = $this->invoiceService->create(
            company_id: auth()->user()->company_id,
            customer_id: $request->customer_id,
            invoice_date: new DateTime($request->invoice_date),
            invoice_type: $request->invoice_type,
            invoice_number: $request->invoice_number,
            due_date: new DateTime($request->due_date),
            category_id: $request->category_id,
            currency_id: $request->currency_id,
            exchange_rate: $request->exchange_rate,
            gross_total: $request->gross_total,
            discount_total: $request->discount_total,
            vat_total: $request->vat_total,
            charge_total: $request->charge_total,
            deduct_total: $request->deduct_total,
            grand_total: $request->grand_total,
            net_total: $request->net_total,
            invoice_lines: $request->invoice_lines
        );

        if ($response->isSuccess()) {
            return redirect()->route('invoice.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('invoice.create')->with('error', $response->getMessage());
        }
    }
    public function edit($id)
    {
        $response = $this->invoiceService->getById($id);
        if ($response->isSuccess()) {
            return view('modules.invoice.edit.index', compact('response'));
        } else {
            return view('modules.invoice.index.index', compact('response'))->with('error', $response->getMessage());
        }
    }
    public function update(CreateRequest $request)
    {
        $response = $this->invoiceService->update(

        );

        if ($response->isSuccess()) {
            return redirect()->route('invoice.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('invoice.edit', $request->id)->with('error', $response->getMessage());
        }
    }
    public function delete()
    {
        $response = $this->invoiceService->delete(request()->id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

}
