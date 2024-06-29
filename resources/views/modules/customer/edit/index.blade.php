@extends('layouts.master')
@section('title', 'Müşteri Güncelle')
@section('content')

    <h4 class="py-1 mb-2">
        <span
            class="text-muted fw-light">
            <a href="{{route('customer.index')}}">Müşteriler</a>
            /</span>
        Müşteri Güncelle
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <h6 class="card-header text-center ">Temel Bilgiler</h6>
                <div class="card-body">
                    <form
                        action="{{ route('customer.update', ['id' => $response->getData()->id]) }}"
                        method="post">
                        @csrf
                        <input type="hidden"
                               name="id"
                               value="{{ $response->getData()->id }}">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"
                                   for="is_person">Şahıs Şirketi Mi?
                            </label>
                            <div class="col-sm-9">
                                <select id="is_person"
                                        name="is_person"
                                        class="form-select select2">
                                    <option value="" {{ old('is_person',$response->getData()->is_person) === null ? 'selected' : '' }}>
                                        Seçiniz
                                    </option>
                                    <option value="1" {{ old('is_person',$response->getData()->is_person) == '1' ? 'selected' : '' }}>
                                        Evet
                                    </option>
                                    <option value="0" {{ old('is_person',$response->getData()->is_person) == '0' ? 'selected' : '' }}>
                                        Hayır
                                    </option>
                                </select>
                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('is_person') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="code">Müşteri Kodu
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="code"
                                       name="code"
                                       class="form-control required"
                                       placeholder="Kısa ünvan"
                                       value="{{ old('code', $response->getData()->code) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('code') ?? '' }}</span>
                            </div>

                            <label class="col-sm-2 col-form-label"
                                   for="title">Ünvan
                            </label>
                            <div class="col-sm-4">
                                <input type="text"
                                       id="title"
                                       name="title"
                                       class="form-control required"
                                       placeholder="Firma ünvanı"
                                       value="{{ old('title', $response->getData()->title) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('title') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="first_name">Ad
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="first_name"
                                       name="first_name"
                                       class="form-control"
                                       placeholder="Ad"
                                       value="{{ old('first_name', $response->getData()->first_name) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('first_name') ?? '' }}</span>
                            </div>
                            <label class="col-sm-2 col-form-label"
                                   for="last_name">Soyad
                            </label>
                            <div class="col-sm-4">
                                <input type="text"
                                       id="last_name"
                                       name="last_name"
                                       class="form-control"
                                       placeholder="Soyad"
                                       value="{{ old('last_name', $response->getData()->last_name) }}">

                                <span class=" help-block error-help-block
                                           mx-1">
                                    {{ $errors->first('last_name') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="tax_number">Vergi Numarası
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="tax_number"
                                       name="tax_number"
                                       class="form-control required"
                                       placeholder="Vergi Numarası"
                                       value="{{ old('tax_number', $response->getData()->tax_number) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('tax_number') ?? '' }}</span>

                            </div>
                            <label class="col-sm-2 col-form-label"
                                   for="identity_number">Tc Kimlik Numarası
                            </label>
                            <div class="col-sm-4">
                                <input type="text"
                                       id="identity_number"
                                       name="identity_number"
                                       class="form-control required"
                                       placeholder="Tc kimlik no"
                                       value="{{ old('identity_number', $response->getData()->identity_number) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('identity_number') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="address">Adres
                            </label>
                            <div class="col-sm-9">
                                <textarea id="address"
                                          rows="1"
                                          name="address"
                                          class="form-control required"
                                          placeholder="Adres">
                                    {{ old('address', $response->getData()->address) }}
                                </textarea>
                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('address') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="city">Şehir
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="city"
                                       name="city"
                                       class="form-control required"
                                       placeholder="Şehir"
                                       value="{{ old('city', $response->getData()->city) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('city') ?? '' }}</span>
                            </div>
                            <label class="col-sm-2 col-form-label"
                                   for="town">İlçe/Kasaba
                            </label>
                            <div class="col-sm-4">
                                <input type="text"
                                       id="town"
                                       name="town"
                                       class="form-control required"
                                       placeholder="İlçe/Kasaba"
                                       value="{{ old('town', $response->getData()->town) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('town') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="country">Ülke
                            </label>
                            <div class="col-sm-3">
                                <input type="text"
                                       id="country"
                                       name="country"
                                       class="form-control required"
                                       placeholder="Ülke"
                                       value="{{ old('country', $response->getData()->country) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('country') ?? '' }}</span>

                            </div>
                            <label class="col-sm-2 col-form-label"
                                   for="tax_office">Vergi Dairesi
                            </label>
                            <div class="col-sm-4">
                                <input type="text"
                                       id="tax_office"
                                       name="tax_office"
                                       class="form-control"
                                       placeholder="Vergi Dairesi"
                                       value="{{ old('tax_office', $response->getData()->tax_office) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('tax_office') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="email">Email
                            </label>
                            <div class="col-sm-9">
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Email"
                                       value="{{ old('email', $response->getData()->email) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('email') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="phone">Telefon
                            </label>
                            <div class="col-sm-3">
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       class="form-control"
                                       placeholder="Telefon"
                                       value="{{ old('phone', $response->getData()->phone) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('phone') ?? '' }}</span>
                            </div>
                            <label class="col-sm-2 col-form-label"
                                   for="fax">Fax
                            </label>
                            <div class="col-sm-4">
                                <input type="tel"
                                       id="fax"
                                       name="fax"
                                       class="form-control"
                                       placeholder="Fax"
                                       value="{{ old('fax', $response->getData()->fax) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('fax') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="mobile_phone">Gsm
                            </label>
                            <div class="col-sm-9">
                                <input type="tel"
                                       id="mobile_phone"
                                       name="mobile_phone"
                                       class="form-control"
                                       placeholder="Gsm"
                                       value="{{ old('mobile_phone', $response->getData()->mobile_phone) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('mobile_phone') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="web_site">Web Site
                            </label>
                            <div class="col-sm-9">
                                <input type="tel"
                                       id="web_site"
                                       name="web_site"
                                       class="form-control"
                                       placeholder="Web site"
                                       value="{{ old('web_site', $response->getData()->web_site) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('web_site') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="web_site">Özel Kod 1/2/3
                            </label>
                            <div class="col-sm-3">
                                <input type="tel"
                                       id="specode1"
                                       name="specode1"
                                       class="form-control"
                                       placeholder="Özelkod 1"
                                       value="{{ old('specode1', $response->getData()->specode1) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('specode1') ?? '' }}</span>
                            </div>

                            <div class="col-sm-3">
                                <input type="tel"
                                       id="specode2"
                                       name="specode2"
                                       class="form-control"
                                       placeholder="Özelkod 2"
                                       value="{{ old('specode2', $response->getData()->specode2) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('specode2') ?? '' }}</span>
                            </div>

                            <div class="col-sm-3">
                                <input type="tel"
                                       id="specode3"
                                       name="specode3"
                                       class="form-control"
                                       placeholder="Özelkod 3"
                                       value="{{ old('specode3', $response->getData()->specode3) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('specode3') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"
                                   for="note">Not
                            </label>
                            <div class="col-sm-9">
                                <input type="note"
                                       id="note"
                                       name="note"
                                       class="form-control"
                                       placeholder="Not"
                                       value="{{ old('note', $response->getData()->note) }}">

                                <span class="help-block error-help-block mx-1">
                                    {{ $errors->first('note') ?? '' }}</span>
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
                                    <option value="" {{ old('is_active',$response->getData()->is_active) === null ? 'selected' : '' }}>
                                        Seçiniz
                                    </option>
                                    <option value="1" {{ old('is_active',$response->getData()->is_active) == '1' ? 'selected' : '' }}>
                                        Evet
                                    </option>
                                    <option value="0" {{ old('is_active',$response->getData()->is_active) == '0' ? 'selected' : '' }}>
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
                                        class="btn btn-primary float-end mx-2">Güncelle
                                </button>
                                <a href="{{ route('customer.index') }}"
                                   class="btn btn-info float-end">Geri Dön
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.customer.create.components.style')
@endsection

@section('customScript')
    @include('modules.customer.create.components.script')
@endsection
