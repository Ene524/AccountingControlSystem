<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ProductController\CreateRequest;
use App\Interfaces\Eloquent\ICommonService;
use App\Interfaces\Eloquent\IProductService;

class ProductController extends Controller
{
    use HttpResponse;

    private IProductService $productService;
    private ICommonService $commonService;

    public function __construct(IProductService $productService, ICommonService $commonService)
    {
        $this->productService = $productService;
        $this->commonService = $commonService;
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
        $taxExemptions=$this->commonService->getTaxExemptions()->getData();
        $witholdings=$this->commonService->getWitholdings()->getData();
        $units=$this->commonService->getUnits()->getData();
        $taxes=$this->commonService->getTaxes()->getData();
        return view('modules.product.create.index',compact('units','taxExemptions','witholdings','taxes'));
    }

    public function store(CreateRequest $request)
    {
        $response = $this->productService->create(
            company_id: auth()->user()->company_id,
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
            return redirect()->route('product.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('product.create')->with('error', $response->getMessage());
        }
    }

    public function edit($id)
    {
        $response = $this->productService->getById($id);
        $taxExemptions=$this->commonService->getTaxExemptions()->getData();
        $witholdings=$this->commonService->getWitholdings()->getData();
        $units=$this->commonService->getUnits()->getData();
        $taxes=$this->commonService->getTaxes()->getData();
        if ($response!=null) {
            return view('modules.product.edit.index', compact('response','units','taxExemptions','witholdings','taxes'));
        } else {
            return view('modules.product.index.index', compact('response'))->with('error', $response->getMessage());
        }
    }

    public function update(CreateRequest $request)
    {
        $response = $this->productService->update(
            id: $request->id,
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
            return redirect()->route('product.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('product.edit', $request->id)->with('error', $response->getMessage());
        }
    }

    public function delete()
    {
        $response = $this->productService->delete(request()->id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

}
