<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IProductService;
use App\Models\Product;

class ProductService implements IProductService
{


    public function getAll(): ServiceResponse
    {
        $products = Product::where('company_id', auth()->user()->company_id)->get();
        return new ServiceResponse(true, "Ürünler getirildi", $products, 200);
    }

    public function delete(int $id): ServiceResponse
    {
        $product = $this->getById($id)->getData();
        if ($product) {
            $product->delete();
            return new ServiceResponse(true, "Ürün silindi", null, 200);
        } else {
            return new ServiceResponse(false, "Ürün bulunamadı", null, 404);
        }
    }

    public function getById(int $id): ServiceResponse
    {
        $product = Product::find($id);
        if ($product) {
            return new ServiceResponse(true, "Ürün getirildi", $product, 200);
        } else {
            return new ServiceResponse(false, "Ürün bulunamadı", null, 404);
        }
    }

    public function create(): ServiceResponse
    {
        // TODO: Implement create() method.
    }

    public function update(): ServiceResponse
    {
        // TODO: Implement update() method.
    }
}
