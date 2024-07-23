<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\InvoiceController\CreateRequest;
use App\Interfaces\Eloquent\IInvoiceService;

class InvoiceController extends Controller
{
    use HttpResponse;
    private IInvoiceService $invoiceService;
    public function __construct(IInvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
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

    public function store(CreateRequest $request)
    {
        $response = $this->invoiceService->create(

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
