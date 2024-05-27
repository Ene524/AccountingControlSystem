<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ProductController\CreateRequest;
use App\Interfaces\Eloquent\IProductService;

class ProductController extends Controller
{
    use HttpResponse;

    private IProductService $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('modules.product.index.index');
    }
    public function getProducts()
    {
        $response = $this->productService->getAll();

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
    public function create()
    {
        return view('modules.product.create-update.index');
    }
    public function store(CreateRequest $request)
    {
        $response = $this->productService->create(
            company_id: $request->company_id,
            code: $request->code,
            name: $request->name,
            description: $request->description,
            type: $request->type,
            sell_price: $request->sell_price,
            purchase_price: $request->purchase_price,
            unit_id: $request->unit_id,
            vat: $request->vat,
            barcode: $request->barcode,
            is_witholding: $request->is_witholding,
            witholding_id: $request->witholding_id,
            tax_exemption_id: $request->tax_exemption_id,
            tax_id: $request->tax_id,
            specode1: $request->specode1,
            specode2: $request->specode2,
            specode3: $request->specode3
        );

        if ($response->isSuccess()) {
            return redirect()->route('customer.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('customer.create')->with('error', $response->getMessage());
        }
    }
    public function edit($id)
    {
        $response = $this->productService->getById($id);

        if ($response->isSuccess()) {
            return view('modules.customer.create-update.index', compact('response'));
        } else {
            return view('modules.product.index.index', compact('response'))->with('error', $response->getMessage());
        }
    }
    public function update(CreateRequest $request)
    {
        $response = $this->customerService->update(
            id: $request->id,
            company_id: $request->company_id,
            code: $request->code,
            name: $request->name,
            description: $request->description,
            type: $request->type,
            sell_price: $request->sell_price,
            purchase_price: $request->purchase_price,
            unit_id: $request->unit_id,
            vat: $request->vat,
            barcode: $request->barcode,
            is_witholding: $request->is_witholding,
            witholding_id: $request->witholding_id,
            tax_exemption_id: $request->tax_exemption_id,
            tax_id: $request->tax_id,
            specode1: $request->specode1,
            specode2: $request->specode2,
            specode3: $request->specode3
        );

        if ($response->isSuccess()) {
            return redirect()->route('customer.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('customer.edit', $request->id)->with('error', $response->getMessage());
        }
    }
    public function delete()
    {
        $response = $this->customerService->delete(request()->id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

}
