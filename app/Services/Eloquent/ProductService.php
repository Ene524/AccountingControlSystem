<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IProductService;
use App\Models\Product;

/**
 *
 */
class ProductService implements IProductService
{


    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $products = Product::where('company_id', auth()->user()->company_id)->get();
        return new ServiceResponse(true, "Ürünler getirildi", $products, 200);
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
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

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $product = Product::find($id);
        if ($product) {
            return new ServiceResponse(true, "Ürün getirildi", $product, 200);
        } else {
            return new ServiceResponse(false, "Ürün bulunamadı", null, 404);
        }
    }

    /**
     * @param int $company_id
     * @param string $code
     * @param string $name
     * @param string $description
     * @param int $type
     * @param float|null $sell_price
     * @param float|null $purchase_price
     * @param int|null $unit_id
     * @param int|null $vat
     * @param string|null $barcode
     * @param bool|null $is_witholding
     * @param int|null $witholding_id
     * @param int|null $tax_exemption_id
     * @param int|null $tax_id
     * @param string|null $specode1
     * @param string|null $specode2
     * @param string|null $specode3
     * @return ServiceResponse
     */
    public function create(
        int     $company_id,
        string  $code,
        string  $name,
        string  $description,
        int     $type,
        ?float  $sell_price,
        ?float  $purchase_price,
        ?int    $unit_id,
        ?int    $vat,
        ?string $barcode,
        ?bool   $is_witholding,
        ?int    $witholding_id,
        ?int    $tax_exemption_id,
        ?int    $tax_id,
        ?string $specode1,
        ?string $specode2,
        ?string $specode3
    ): ServiceResponse
    {
        $product = Product::create([
            'company_id' => $company_id,
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'sell_price' => $sell_price,
            'purchase_price' => $purchase_price,
            'unit_id' => $unit_id,
            'vat' => $vat,
            'barcode' => $barcode,
            'is_witholding' => $is_witholding,
            'witholding_id' => $witholding_id,
            'tax_exemption_id' => $tax_exemption_id,
            'tax_id' => $tax_id,
            'specode1' => $specode1,
            'specode2' => $specode2,
            'specode3' => $specode3
        ]);

        return new ServiceResponse(true, "Ürün oluşturuldu", $product, 201);
    }

    /**
     * @param int $id
     * @param string $code
     * @param string $name
     * @param string $description
     * @param int $type
     * @param float|null $sell_price
     * @param float|null $purchase_price
     * @param int|null $unit_id
     * @param int|null $vat
     * @param string|null $barcode
     * @param bool|null $is_witholding
     * @param int|null $witholding_id
     * @param int|null $tax_exemption_id
     * @param int|null $tax_id
     * @param string|null $specode1
     * @param string|null $specode2
     * @param string|null $specode3
     * @return ServiceResponse
     */
    public function update(
        int     $id,
        string  $code,
        string  $name,
        string  $description,
        int     $type,
        ?float  $sell_price,
        ?float  $purchase_price,
        ?int    $unit_id,
        ?int    $vat,
        ?string $barcode,
        ?bool   $is_witholding,
        ?int    $witholding_id,
        ?int    $tax_exemption_id,
        ?int    $tax_id,
        ?string $specode1,
        ?string $specode2,
        ?string $specode3): ServiceResponse
    {
        $product = $this->getById($id)->getData();
        if (!$product) {
            return new ServiceResponse(false, "Ürün bulunamadı", null, 404);
        } else {
            $product->code = $code;
            $product->name = $name;
            $product->description = $description;
            $product->type = $type;
            $product->sell_price = $sell_price;
            $product->purchase_price = $purchase_price;
            $product->unit_id = $unit_id;
            $product->vat = $vat;
            $product->barcode = $barcode;
            $product->is_witholding = $is_witholding;
            $product->witholding_id = $witholding_id;
            $product->tax_exemption_id = $tax_exemption_id;
            $product->tax_id = $tax_id;
            $product->specode1 = $specode1;
            $product->specode2 = $specode2;
            $product->specode3 = $specode3;
            $product->save();
        }
    }
}
