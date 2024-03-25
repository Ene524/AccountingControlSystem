@extends('layouts.Auth.LoginMaster')
@section('title', 'Firma Ekle')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="row">

            <h4 class="py-3 text-center">Ücretsiz Hesap Oluştur</h4>

            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <h5 class="card-header">Firma Bilgilerinizi Doldurunuz</h5>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="short_title">Kısa Ad</label>
                                <div class="col-sm-3">
                                    <input type="text" id="short_title" class="form-control" placeholder="Kısa Ad"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="title">Ünvan</label>
                                <div class="col-sm-4">
                                    <input type="text" id="title" class="form-control" placeholder="Firma ünvanı"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="first_name">Ad</label>
                                <div class="col-sm-3">
                                    <input type="text" id="first_name" class="form-control" placeholder="Ad"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="last_name">Soyad</label>
                                <div class="col-sm-4">
                                    <input type="text" id="last_name" class="form-control" placeholder="Soyad"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="tax_number">Vergi Numarası</label>
                                <div class="col-sm-3">
                                    <input type="text" id="tax_number" class="form-control"
                                           placeholder="Vergi Numarası"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="identity_number">Identity Number</label>
                                <div class="col-sm-4">
                                    <input type="text" id="identity_number" class="form-control"
                                           placeholder="Tc kimlik no"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="address">Adres</label>
                                <div class="col-sm-9">
                                    <textarea id="address" class="form-control" placeholder="Adres"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="city_id">Şehir</label>
                                <div class="col-sm-3">
                                    <input type="text" id="city_id" class="form-control" placeholder="Şehir"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="town_id">İlçe</label>
                                <div class="col-sm-4">
                                    <input type="text" id="town_id" class="form-control" placeholder="İlçe"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="country_id">Ülke</label>
                                <div class="col-sm-3">
                                    <input type="text" id="country_id" class="form-control" placeholder="Ülke"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="tax_office_id">Vergi Dairesi</label>
                                <div class="col-sm-4">
                                    <input type="text" id="tax_office_id" class="form-control" placeholder="Vergi Dairesi"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" class="form-control" placeholder="Email"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="phone">Telefon</label>
                                <div class="col-sm-3">
                                    <input type="tel" id="phone" class="form-control" placeholder="Telefon"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="fax">Fax</label>
                                <div class="col-sm-4">
                                    <input type="tel" id="fax" class="form-control" placeholder="Fax"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="postal_code">Posta Kodu</label>
                                <div class="col-sm-3">
                                    <input type="text" id="postal_code" class="form-control" placeholder="Posta Kodu"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="web_site">Web Site</label>
                                <div class="col-sm-4">
                                    <input type="url" id="web_site" class="form-control" placeholder="Web Site"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="commercial_register_number">Ticari Sicil No</label>
                                <div class="col-sm-3">
                                    <input type="text" id="commercial_register_number" class="form-control"
                                           placeholder="Ticari Sicil No"/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="mernis_number">Mernis No</label>
                                <div class="col-sm-4">
                                    <input type="text" id="mernis_number" class="form-control" placeholder="Mernis No"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="web_service_username">Web Service
                                    Username</label>
                                <div class="col-sm-3">
                                    <input type="text" id="web_service_username" class="form-control" placeholder=""/>
                                </div>
                                <label class="col-sm-2 col-form-label" for="web_service_password">Web Service
                                    Password</label>
                                <div class="col-sm-4">
                                    <input type="password" id="web_service_password" class="form-control"
                                           placeholder=""/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="integrator_id">Integrator ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="integrator_id" class="form-control" placeholder=""/>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('customStyle')
    @include('modules.dashboard.user-company-dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.user-company-dashboard.index.components.script')
@endsection
