@extends('layouts.master')
@section('title', 'Ürün/Hizmet Ekle')
@section('content')

    <h4 class="py-1 mb-2">
        <span
            class="text-muted fw-light">
            <a href="{{route('customer.index')}}">Müşteriler</a>
            /</span>{{isset($response) && $response->isSuccess() ? 'Ürün/Hizmet Güncelle' : 'Ürün/Hizmet Ekle'}}
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form
                        action="{{ isset($response) && $response->isSuccess() ? route('product.update', ['id' => $response->getData()->id]) : route('product.create') }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="code">Kodu</label>
                            <div class="col-sm-2">
                                <input type="text"
                                       id="code"
                                       name="code"
                                       class="form-control "
                                       maxlength="50"
                                       placeholder="Kodu">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('code') ?? '' }}</span>
                            </div>

                            <label class="col-sm-1 col-form-label"
                                   for="name">Adı</label>
                            <div class="col-sm-6">
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control "
                                       maxlength="200"
                                       placeholder="Adı">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('name') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="description">Açıklama</label>
                            <div class="col-sm-9">
                                <input type="text"
                                       id="description"
                                       name="description"
                                       class="form-control "
                                       maxlength="255"
                                       placeholder="Açıklama">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('description') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="type">Tür</label>
                            <div class="col-sm-9"
                                 style="line-height: 30px">
                                <div class="form-check form-check-inline"
                                     style="line-height: 30px">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="type"
                                           id="type1"
                                           value="1">
                                    <label class="form-check-label"
                                           for="type1">Ürün</label>
                                </div>
                                <div class="form-check form-check-inline"
                                     style="line-height: 30px">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="type"
                                           id="type2"
                                           value="2">
                                    <label class="form-check-label"
                                           for="type2">Hizmet</label>
                                </div>
                                <span class="help-block error-help-block mx-1">{{ $errors->first('type') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="sell_price">Sell Price</label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="sell_price"
                                       name="sell_price"
                                       class="form-control"
                                       step="0.01"
                                       placeholder="0,00">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('sell_price') ?? '' }}</span>
                            </div>
                            <label class="col-sm-3 col-form-label"
                                   for="purchase_price">Purchase Price</label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="purchase_price"
                                       name="purchase_price"
                                       class="form-control"
                                       step="0.01">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('purchase_price') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="vat">VAT</label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="vat"
                                       name="vat"
                                       class="form-control"
                                       min="0"
                                       max="100">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('vat') ?? '' }}</span>
                            </div>
                            <label class="col-sm-3 col-form-label"
                                   for="unit_id">Unit ID</label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="unit_id"
                                       name="unit_id"
                                       class="form-control">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('unit_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="barcode">Barcode</label>
                            <div class="col-sm-9">
                                <input type="text"
                                       id="barcode"
                                       name="barcode"
                                       class="form-control"
                                       maxlength="50">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('barcode') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="is_witholding">Is Withholding</label>
                            <div class="col-sm-5 checkbox-inline">
                                <label class="switch switch-square switch-lg">
                                    <input type="checkbox"
                                           class="switch-input"
                                           id="is_witholding"
                                           name="is_witholding">
                                    <span class="switch-toggle-slider">
                              <span class="switch-on">
                                <i class="ti ti-check"></i>
                              </span>
                              <span class="switch-off">
                                <i class="ti ti-x"></i>
                              </span>
                            </span>
                                    <span class="switch-label">Tevkifatlı mı?</span>
                                </label>
                                <span class="help-block error-help-block mx-1">{{ $errors->first('is_witholding') ?? '' }}</span>
                            </div>


                            <label class="col-sm-1 col-form-label"
                                   for="witholding_id">witholding_id</label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="witholding_id"
                                       name="witholding_id"
                                       class="form-control">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('witholding_id') ?? '' }}</span>
                            </div>

                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="witholding_id">Exemption/TaxId</label>
                            <div class="col-sm-4">
                                <input type="number"
                                       id="tax_exemption_id"
                                       name="tax_exemption_id"
                                       class="form-control">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('tax_exemption_id') ?? '' }}</span>
                            </div>
                            <div class="col-sm-5">
                                <input type="number"
                                       id="tax_id"
                                       name="tax_id"
                                       class="form-control">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('tax_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="specode1">Specode1/2/3</label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode1"
                                       name="specode1"
                                       class="form-control"
                                       maxlength="50">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('specode1') ?? '' }}</span>
                            </div>


                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode2"
                                       name="specode2"
                                       class="form-control"
                                       maxlength="50">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('specode2') ?? '' }}</span>
                            </div>


                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode3"
                                       name="specode3"
                                       class="form-control"
                                       maxlength="50">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('specode3') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"
                                   for="is_active">Aktif mi?</label>
                            <div class="col-sm-9">
                                <select id="is_active"
                                        name="is_active"
                                        class="form-select select2">
                                    <option
                                        value="" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) === '' ? 'selected' : '' }}>
                                        Seçiniz
                                    </option>
                                    <option
                                        value="1" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) == '1' ? 'selected' : '' }}>
                                        Evet
                                    </option>
                                    <option
                                        value="0" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) == '0' && old('is_active') !== '' ? 'selected' : '' }}>
                                        Hayır
                                    </option>
                                </select>
                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('is_active') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit"
                                        class="btn btn-primary float-end mx-2">Oluştur
                                </button>
                                <a href="{{ route('product.index') }}"
                                   class="btn btn-info float-end">Geri Dön</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.product.create-update.components.style')
@endsection

@section('customScript')
    @include('modules.product.create-update.components.script')
@endsection
