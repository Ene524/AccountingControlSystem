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
                                <label class="col-sm-3 col-form-label" for="multicol-username">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" id="multicol-username" class="form-control" placeholder="john.doe" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="multicol-email">Email</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="text"
                                            id="multicol-email"
                                            class="form-control"
                                            placeholder="john.doe"
                                            aria-label="john.doe"
                                            aria-describedby="multicol-email2" />
                                        <span class="input-group-text" id="multicol-email2">@example.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-password-toggle">
                                <label class="col-sm-3 col-form-label" for="multicol-password">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="multicol-password"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="multicol-password2" />
                                        <span class="input-group-text cursor-pointer" id="multicol-password2"
                                        ><i class="ti ti-eye-off"></i
                                            ></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4 mx-n4" />
                            <h6>2. Personal Info</h6>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="multicol-full-name">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="multicol-full-name" class="form-control" placeholder="John Doe" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="multicol-country">Country</label>
                                <div class="col-sm-9">
                                    <select id="multicol-country" class="select2 form-select" data-allow-clear="true">
                                        <option value="">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="multicol-birthdate">Birth Date</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        id="multicol-birthdate"
                                        class="form-control dob-picker"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label" for="multicol-phone">Phone No</label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        id="multicol-phone"
                                        class="form-control phone-mask"
                                        placeholder="658 799 8941"
                                        aria-label="658 799 8941" />
                                </div>
                            </div>
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
