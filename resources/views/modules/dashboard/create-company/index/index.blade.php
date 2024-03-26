@extends('layouts.Auth.LoginMaster')
@section('title', 'Firma Ekle')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <h5 class="card-header text-center">Temel Bilgiler</h5>


                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }} <br>
                            </div>
                        @endif

                        <form action="{{route('company.create')}}" method="post">
                            @csrf
                            <hr>
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
                            <h5 class="card-header text-center">Adres Bilgileri</h5>
                            <hr>
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
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-end">Kaydet</button>
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
