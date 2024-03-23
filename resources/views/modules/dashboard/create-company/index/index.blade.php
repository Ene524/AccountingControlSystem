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
                        <form class="card-body">
                            <h6>1. Temel Firma Bilgileri</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="title">Title</label>
                                <div class="col-sm-4">
                                    <input type="text" id="title" class="form-control" placeholder="" />
                                </div>
                                <label class="col-sm-2 col-form-label" for="short_title">Short Title</label>
                                <div class="col-sm-3">
                                    <input type="text" id="short_title" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="is_person">Is Person</label>
                                <div class="col-sm-9">
                                    <input type="text" id="is_person" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="first_name">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="first_name" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="last_name">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="last_name" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="tax_number">Tax Number</label>
                                <div class="col-sm-9">
                                    <input type="text" id="tax_number" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="identity_number">Identity Number</label>
                                <div class="col-sm-9">
                                    <input type="text" id="identity_number" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="tax_office_id">Tax Office ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="tax_office_id" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <!-- Add other fields as per your requirements -->
                            <hr class="my-4 mx-n4" />
                            <h6>2. Address Info</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="address">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" id="address" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="city_id">City ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="city_id" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="town_id">Town ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="town_id" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="country_id">Country ID</label>
                                <div class="col-sm-9">
                                    <input type="text" id="country_id" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="postal_code">Postal Code</label>
                                <div class="col-sm-9">
                                    <input type="text" id="postal_code" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <!-- Add other fields as per your requirements -->
                            <hr class="my-4 mx-n4" />
                            <h6>3. Contact Info</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" id="email" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="phone">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" id="phone" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="fax">Fax</label>
                                <div class="col-sm-9">
                                    <input type="text" id="fax" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <!-- Add other fields as per your requirements -->
                            <hr class="my-4 mx-n4" />
                            <h6>4. Additional Info</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="web_site">Web Site</label>
                                <div class="col-sm-9">
                                    <input type="text" id="web_site" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="commercial_register_number">Commercial Register Number</label>
                                <div class="col-sm-9">
                                    <input type="text" id="commercial_register_number" class="form-control" placeholder="" />
                                </div>
                            </div>
                            <!-- Add other fields as per your requirements -->
                            <div class="pt-4">
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary me-sm-2 me-1">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                    </div>
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
    @include('modules.dashboard.user-company-dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.user-company-dashboard.index.components.script')
@endsection
