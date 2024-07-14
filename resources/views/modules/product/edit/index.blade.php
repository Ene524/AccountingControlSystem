@extends('layouts.master')
@section('title', 'Ürün/Hizmet Güncelle')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">
            <a href="{{ route('product.index') }}">Ürünler/Hizmetler</a>
            /
        </span>Ürün/Hizmet Güncelle
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form
                        action="{{ route('product.edit', ['id' => $response->getData()->id]) }}"
                        method="post">@csrf
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="code">Kodu
                            </label>
                            <div class="col-sm-2">
                                <input type="text"
                                       id="code"
                                       name="code"
                                       class="form-control "
                                       maxlength="50"
                                       placeholder="Kodu"
                                       value="{{ old('code', $response->getData()->code) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('code') ?? '' }}</span>
                            </div>
                            <label class="col-sm-1 col-form-label"
                                   for="name">Adı
                            </label>
                            <div class="col-sm-6">
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control "
                                       maxlength="200"
                                       placeholder="Adı"
                                       value="{{ old('name', $response->getData()->name) }}">
                                <span class="help-block error-help-block mx-1">{{ $errors->first('name') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="description">Açıklama
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                       id="description"
                                       name="description"
                                       class="form-control "
                                       maxlength="255"
                                       placeholder="Açıklama"
                                       value="{{ old('description', $response->getData()->description) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('description') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"
                                   for="type">Tür
                            </label>
                            <div class="col-sm-9"
                                 style="line-height: 30px">
                                <div class="form-check form-check-inline"
                                     style="line-height: 30px">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="type"
                                        value="1" {{ old('type')==1 || ($response->getData()->type)==1 ? 'checked':'' }} >
                                    <label
                                        class="form-check-label"
                                        for="type1">Ürün
                                    </label>
                                </div>
                                <div class="form-check form-check-inline"
                                     style="line-height: 30px">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="type"
                                        value="2" {{ old('type')==2 || ($response->getData()->type)==2 ? 'checked':'' }} >
                                    <label
                                        class="form-check-label"
                                        for="type2">Hizmet
                                    </label>
                                </div>
                                <span class="help-block error-help-block mx-1">{{ $errors->first('type') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="sell_price">Satış Fiyatı
                            </label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="sell_price"
                                       name="sell_price"
                                       class="form-control"
                                       step="1"
                                       placeholder="0,00"
                                       value="{{ old('sell_price', $response->getData()->sell_price) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('sell_price') ?? '' }}</span>
                            </div>
                            <label class="col-sm-3 col-form-label text-end"
                                   for="purchase_price">Alış Fiyatı
                            </label>
                            <div class="col-sm-3">
                                <input type="number"
                                       id="purchase_price"
                                       name="purchase_price"
                                       class="form-control"
                                       step="1"
                                       placeholder="0,00"
                                       value="{{ old('purchase_price', $response->getData()->purchase_price) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('purchase_price') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="vat">Kdv
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control select2"
                                        name="vat"
                                        id="vat">
                                    <option
                                        value="0" {{$response->getData()->vat==0 ? 'selected' : ''}}>
                                        0%
                                    </option>
                                    <option
                                        value="1" {{$response->getData()->vat==1 ? 'selected' : ''}}>
                                        1%
                                    </option>
                                    <option
                                        value="10" {{$response->getData()->vat==10 ? 'selected' : ''}}>
                                        10%
                                    </option>
                                    <option
                                        value="20" {{$response->getData()->vat==20 ? 'selected' : ''}}>
                                        20%
                                    </option>
                                </select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('vat') ?? '' }}</span>
                            </div>
                            <label class="col-sm-3 col-form-label text-end"
                                   for="unit_id">Birim
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control"
                                        name="unit_id"
                                        id="unit_id">
                                    <option value="">Seçiniz</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{$unit->id==$response->getData()->unit_id ? 'selected':''}}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('unit_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="barcode">Barkod
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                       id="barcode"
                                       name="barcode"
                                       class="form-control"
                                       maxlength="50"
                                       value="{{ old('barcode', $response->getData()->barcode) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('barcode') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="is_witholding">Tevkifat
                                Bilgisi
                            </label>
                            <div class="col-sm-5 checkbox-inline">
                                <label class="switch switch-square switch-lg">
                                    <input type="checkbox"
                                           class="switch-input"
                                           id="is_witholding"
                                           name="is_witholding"
                                        {{$response->getData()->is_witholding==1 ? 'checked' : ''}}
                                    >
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
                                   for="witholding_id">Tevkifat Kodu
                            </label>
                            <div class="col-sm-3">
                                <select class="form-control select2"
                                        name="witholding_id"
                                        id="witholding_id"
                                        disabled>
                                    <option value="">Seçiniz</option>@foreach($witholdings as $witholding)
                                        <option
                                            value="{{ $witholding->id }}" {{$witholding->id==$response->getData()->witholding_id ? 'selected':''}}>{{ $witholding->code." - ". $witholding->name ."-". $witholding->numerator."/10" }}</option>
                                    @endforeach</select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('witholding_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Exemption/TaxId</label>
                            <div class="col-sm-4">
                                <select class="form-control select2"
                                        name="tax_exemption_id"
                                        id="tax_exemption_id">
                                    <option value="">Seçiniz</option>@foreach($taxExemptions as $taxExemption)
                                        <option
                                            value="{{ $taxExemption->id }}" {{$taxExemption->id==$response->getData()->tax_exemption_id ? 'selected':''}}>{{ $taxExemption->code." - ". $taxExemption->name  }}</option>
                                    @endforeach</select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('tax_exemption_id') ?? '' }}</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control select2"
                                        name="tax_id"
                                        id="tax_id">
                                    <option value="">Seçiniz</option>
                                    @foreach($taxes as $tax)
                                        <option
                                            value="{{ $tax->id }}" {{$tax->id==$response->getData()->tax_id ? 'selected':''}}>{{ $tax->code." - ". $tax->name  }}</option>
                                    @endforeach</select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('tax_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="specode1">Specode1/2/3
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode1"
                                       name="specode1"
                                       class="form-control"
                                       maxlength="50"
                                       value="{{ old('specode1', $response->getData()->specode1) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('specode1') ?? '' }}</span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode2"
                                       name="specode2"
                                       class="form-control"
                                       maxlength="50"
                                       value="{{ old('specode2', $response->getData()->specode2) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('specode2') ?? '' }}</span>
                            </div>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="specode3"
                                       name="specode3"
                                       class="form-control"
                                       maxlength="50"
                                       value="{{ old('specode3', $response->getData()->specode3) }}">
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('specode3') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"
                                   for="is_active">Aktif mi?
                            </label>
                            <div class="col-sm-9">
                                <select id="is_active"
                                        name="is_active"
                                        class="form-select select2">
                                    <option
                                        value=""{{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) === '' ? 'selected' : '' }}>
                                        Seçiniz
                                    </option>
                                    <option
                                        value="1"{{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) == '1' ? 'selected' : '' }}>
                                        Evet
                                    </option>
                                    <option
                                        value="0"{{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : null) == '0' && old('is_active') !== '' ? 'selected' : '' }}>
                                        Hayır
                                    </option>
                                </select>
                                <span
                                    class="help-block error-help-block mx-1">{{ $errors->first('is_active') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit"
                                        class="btn btn-primary float-end mx-2">Güncelle
                                </button>
                                <a href="{{ route('product.index') }}"
                                   class="btn btn-info float-end">Geri Dön</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.product.edit.components.style')
@endsection

@section('customScript')
    @include('modules.product.edit.components.script')
@endsection
