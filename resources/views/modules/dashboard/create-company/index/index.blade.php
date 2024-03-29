@extends('layouts.Auth.LoginMaster')
@section('title', 'Firma Ekle')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <h5 class="card-header text-center">Temel Bilgiler</h5>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }} <br>
                            </div>
                        @endif

                        <form action="{{ route('company.create') }}"
                              method="post">
                            @csrf
                            <hr>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="is_person">Şahıs Şirketi Mi?</label>
                                <div class="col-sm-9">
                                    <select id="is_person"
                                            name="is_person"
                                            class="form-select">
                                        <option value="{{ null }}">Seçiniz</option>
                                        <option value="1">Evet</option>
                                        <option value="0">Hayır</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="short_title">Kısa Ad</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                           id="short_title"
                                           name="short_title"
                                           class="form-control"
                                           placeholder="Kısa ünvan"/>
                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="title">Ünvan</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           id="title"
                                           name="title"
                                           class="form-control"
                                           placeholder="Firma ünvanı"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="first_name">Ad</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                           id="first_name"
                                           name="first_name"
                                           class="form-control"
                                           placeholder="Ad"/>
                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="last_name">Soyad</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           id="last_name"
                                           name="last_name"
                                           class="form-control"
                                           placeholder="Soyad"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="tax_number">Vergi Numarası</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                           id="tax_number"
                                           name="tax_number"
                                           class="form-control"
                                           placeholder="Vergi Numarası"/>
                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="identity_number">Tc Kimlik Numarası</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           id="identity_number"
                                           name="identity_number"
                                           class="form-control"
                                           placeholder="Tc kimlik no"/>
                                </div>
                            </div>
                            <h5 class="card-header text-center">Adres Bilgileri</h5>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="address">Adres</label>
                                <div class="col-sm-9">
                                    <textarea id="address"
                                              name="address"
                                              class="form-control"
                                              placeholder="Adres"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="city">Şehir</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                           id="city"
                                           name="city"
                                           class="form-control"
                                           placeholder="Şehir"/>
                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="town">İlçe/Kasaba</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           id="town"
                                           name="town"
                                           class="form-control"
                                           placeholder="İlçe/Kasaba"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="country">Ülke</label>
                                <div class="col-sm-3">
                                    <input type="text"
                                           id="country"
                                           name="country"
                                           class="form-control typeahead"
                                           placeholder="Ülke"/>

                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="tax_office">Vergi Dairesi</label>
                                <div class="col-sm-4">
                                    <input type="text"
                                           id="tax_office"
                                           name="tax_office"
                                           class="form-control"
                                           placeholder="Vergi Dairesi"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Email"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"
                                       for="phone">Telefon</label>
                                <div class="col-sm-3">
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           class="form-control"
                                           placeholder="Telefon"/>
                                </div>
                                <label class="col-sm-2 col-form-label"
                                       for="fax">Fax</label>
                                <div class="col-sm-4">
                                    <input type="tel"
                                           id="fax"
                                           name="fax"
                                           class="form-control"
                                           placeholder="Fax"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit"
                                            class="btn btn-primary float-end mx-2">Oluştur
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
    @include('modules.dashboard.create-company.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.create-company.index.components.script')
@endsection
