@extends('layouts.Auth.RegisterMaster')
@section('title', 'Kayıt ol')

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img
                        src="{{asset('assets')}}/img/illustrations/auth-register-illustration-light.png"
                        alt="auth-register-cover"
                        class="img-fluid my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-register-illustration-light.png"
                        data-app-dark-img="illustrations/auth-register-illustration-dark.png" />

                    <img
                        src="{{asset('assets')}}/img/illustrations/bg-shape-image-light.png"
                        alt="auth-register-cover"
                        class="platform-bg"
                        data-app-light-img="illustrations/bg-shape-image-light.png"
                        data-app-dark-img="illustrations/bg-shape-image-dark.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Register -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-600 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                        fill="#161616" />
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                        fill="#161616" />
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                  </svg>
                </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">Hesabını kontrol altında tut 🚀</h3>
                    <p class="mb-4">Borçların, alacakların, gelirlerin, giderlerin ve stokların elinin altında olsun</p>




                    <form class="mb-3" action="{{route('user.register')}}" method="POST">
                        @csrf
                        <!-- User Information -->
                        <div class="row mb-3">
                            <div class="col">
                                <label for="userName" class="form-label">Name</label>
                                <input type="text" class="form-control"  name="name" placeholder="Name" />
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('name')}}</span>
                            </div>
                            <div class="col">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" />
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                            <span id="email-error" class="help-block error-help-block">{{$errors->first('password')}}</span>
                        </div>

                        <!-- Company Information -->
                        <div class="mb-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" name="is_person">
                                <label class="form-check-label" for="is_person"> Şahıs Firması Mı? </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="first_name" class="form-label">Ad</label>
                                <input type="text" class="form-control" name="first_name" placeholder="" disabled />
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('first_name')}}</span>
                            </div>
                            <div class="col">
                                <label for="last_name" class="form-label">Soyad</label>
                                <input type="text" class="form-control" name="last_name" placeholder="" disabled/>
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('last_name')}}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="companyTitle" class="form-label">Company Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Company Title" />
                            <span id="email-error" class="help-block error-help-block">{{$errors->first('title')}}</span>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="companyTaxNumber" class="form-label">Tax Number</label>
                                <input type="text" class="form-control" name="tax_number" placeholder="Tax Number" />
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('tax_number')}}</span>
                            </div>
                            <div class="col">
                                <label for="companyIdentityNumber" class="form-label">Identity Number</label>
                                <input type="text" class="form-control" name="identity_number" placeholder="Identity Number"  disabled/>
                                <span id="email-error" class="help-block error-help-block">{{$errors->first('identity_number')}}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="companyPhone" class="form-label">Company Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Company Phone" />
                            <span id="email-error" class="help-block error-help-block">{{$errors->first('phone')}}</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                    <p class="text-center">
                        <span>Zaten bir hesabın var mı?</span>
                        <a href="{{route('user.showLogin')}}">
                            <span>Giriş Yap</span>
                        </a>
                    </p>


                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
@endsection


@section('customStyle')
    @include('modules.authentication.register.components.style')
@endsection

@section('customScript')
    @include('modules.authentication.register.components.script')
@endsection
