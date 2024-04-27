@extends('layouts.master')
@section('title', 'Firma Ekle')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <h6 class="card-header text-center ">Temel Bilgiler</h6>
                    <div class="card-body">
                        <form
                            action="{{ isset($response) && $response->isSuccess() ? route('company.update') : route('company.create') }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="id"
                                value="{{ isset($response) ? $response->getData()->id : '' }}">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="is_person">Şahıs Şirketi Mi?</label>
                                <div class="col-sm-9">
                                    <select id="is_person" name="is_person" class="form-select select2">
                                        <option value="" {{ old('is_person', isset($response) && $response->isSuccess() ? $response->getData()->is_person : '') === null ? 'selected' : '' }}>Seçiniz</option>
                                        <option value="1" {{ old('is_person', isset($response) && $response->isSuccess() ? $response->getData()->is_person : '') == 1 ? 'selected' : '' }}>Evet</option>
                                        <option value="0" {{ old('is_person', isset($response) && $response->isSuccess() ? $response->getData()->is_person : '') === '0' ? 'selected' : '' }}>Hayır</option>
                                    </select>


                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('is_person') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="short_title">Kısa Ad</label>
                                <div class="col-sm-3">
                                    <input type="text" id="short_title" name="short_title" class="form-control required"
                                        placeholder="Kısa ünvan"
                                        value="{{ isset($response) ? $response->getData()->short_title ?? old('short_title') : old('short_title') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('short_title') ?? '' }}</span>
                                </div>

                                <label class="col-sm-2 col-form-label" for="title">Ünvan</label>
                                <div class="col-sm-4">
                                    <input type="text" id="title" name="title" class="form-control required"
                                        placeholder="Firma ünvanı"
                                        value="{{ isset($response) ? $response->getData()->title ?? old('title') : old('title') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('title') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="first_name">Ad</label>
                                <div class="col-sm-3">
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        placeholder="Ad"
                                        value="{{ isset($response) ? $response->getData()->first_name ?? old('first_name') : old('first_name') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('first_name') ?? '' }}</span>
                                </div>
                                <label class="col-sm-2 col-form-label" for="last_name">Soyad</label>
                                <div class="col-sm-4">
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        placeholder="Soyad"
                                        value="{{ isset($response) ? $response->getData()->last_name ?? old('last_name') : old('last_name') }}">

                                    <span
                                        class=" help-block error-help-block
                                           mx-1">
                                        {{ $errors->first('last_name') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="tax_number">Vergi Numarası</label>
                                <div class="col-sm-3">
                                    <input type="text" id="tax_number" name="tax_number" class="form-control required"
                                        placeholder="Vergi Numarası"
                                        value="{{ isset($response) ? $response->getData()->tax_number ?? old('tax_number') : old('tax_number') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('tax_number') ?? '' }}</span>

                                </div>
                                <label class="col-sm-2 col-form-label" for="identity_number">Tc Kimlik Numarası</label>
                                <div class="col-sm-4">
                                    <input type="text" id="identity_number" name="identity_number"
                                        class="form-control required" placeholder="Tc kimlik no"
                                        value="{{ isset($response) ? $response->getData()->identity_number ?? old('identity_number') : old('identity_number') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('identity_number') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="address">Adres</label>
                                <div class="col-sm-9">
                                    <textarea id="address" rows="1" name="address" class="form-control required" placeholder="Adres">
                                           {{ isset($response) ? $response->getData()->address ?? old('address') : old('address') }}
                                    </textarea>
                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('address') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="city">Şehir</label>
                                <div class="col-sm-3">
                                    <input type="text" id="city" name="city" class="form-control required"
                                        placeholder="Şehir"
                                        value="{{ isset($response) ? $response->getData()->city ?? old('city') : old('city') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('city') ?? '' }}</span>
                                </div>
                                <label class="col-sm-2 col-form-label" for="town">İlçe/Kasaba</label>
                                <div class="col-sm-4">
                                    <input type="text" id="town" name="town" class="form-control required"
                                        placeholder="İlçe/Kasaba"
                                        value="{{ isset($response) ? $response->getData()->town ?? old('town') : old('town') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('town') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="country">Ülke</label>
                                <div class="col-sm-3">
                                    <input type="text" id="country" name="country" class="form-control required"
                                        placeholder="Ülke"
                                        value="{{ isset($response) ? $response->getData()->country ?? old('country') : old('country') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('country') ?? '' }}</span>

                                </div>
                                <label class="col-sm-2 col-form-label" for="tax_office">Vergi Dairesi</label>
                                <div class="col-sm-4">
                                    <input type="text" id="tax_office" name="tax_office" class="form-control"
                                        placeholder="Vergi Dairesi"
                                        value="{{ isset($response) ? $response->getData()->tax_office ?? old('tax_office') : old('tax_office') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('tax_office') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email"
                                        value="{{ isset($response) ? $response->getData()->email ?? old('email') : old('email') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('email') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="phone">Telefon</label>
                                <div class="col-sm-3">
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        placeholder="Telefon"
                                        value="{{ isset($response) ? $response->getData()->phone ?? old('phone') : old('phone') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('phone') ?? '' }}</span>
                                </div>
                                <label class="col-sm-2 col-form-label" for="fax">Fax</label>
                                <div class="col-sm-4">
                                    <input type="tel" id="fax" name="fax" class="form-control"
                                        placeholder="Fax"
                                        value="{{ isset($response) ? $response->getData()->fax ?? old('fax') : old('fax') }}">

                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('fax') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="is_active">Aktif mi?</label>
                                <div class="col-sm-9">
                                    <select id="is_active" name="is_active" class="form-select select2">
                                        <option value="" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : '') === null ? 'selected' : '' }}>Seçiniz</option>
                                        <option value="1" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : '') == 1 ? 'selected' : '' }}>Evet</option>
                                        <option value="0" {{ old('is_active', isset($response) && $response->isSuccess() ? $response->getData()->is_active : '') === '0' ? 'selected' : '' }}>Hayır</option>
                                    </select>
                                    <span class="help-block error-help-block mx-1">
                                        {{ $errors->first('is_active') ?? '' }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-end mx-2">Oluştur
                                    </button>
                                    <a href="{{ route('dashboard.showUserCompanyDashboard') }}"
                                        class="btn btn-info float-end">Geri Dön</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('customStyle')
    @include('modules.dashboard.create-update-company.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.create-update-company.index.components.script')
@endsection
