<!doctype html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('assets')}}/"
    data-template="vertical-menu-template">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Email Doğrulama</title>

    <meta name="description"
          content=""/>

    <!-- Favicon -->
    <link rel="icon"
          type="image/x-icon"
          href="{{asset('assets')}}/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com"/>
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet"/>

    <!-- Icons -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/fonts/fontawesome.css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/fonts/flag-icons.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/css/rtl/core.css"
          class="template-customizer-core-css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/css/rtl/theme-default.css"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/css/demo.css"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/libs/node-waves/node-waves.css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/libs/typeahead-js/typeahead.css"/>

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/vendor/css/pages/page-auth.css"/>

    <!-- Helpers -->
    <script src="{{asset('assets')}}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assets')}}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets')}}/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="authentication-wrapper authentication-basic px-4">
    <div class="authentication-inner py-4">
        <!-- Verify Email -->
        <div class="card">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center mb-4 mt-2">
                    <a href="index.html"
                       class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <svg width="32"
                       height="22"
                       viewBox="0 0 32 22"
                       fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0"/>
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                        fill="#161616"/>
                    <path
                        opacity="0.06"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                        fill="#161616"/>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0"/>
                  </svg>
                </span>
                        <span class="app-brand-text demo text-body fw-bold ms-1">Vuexy</span>
                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-1 pt-2">Email adresini doğrula</h4>
                <p class="text-start mb-4">
                    Hesap aktivasyon bağlantısı e-posta adresinize gönderildi: <b>{{$user->email}} </b> Devam etmek için posta kutunuzu
                    kontrol edin.
                </p>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }} <br>
                    </div>
                @endif

                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible"
                             role="alert">
                            {{$error}}
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                <form action="{{route('verification.resend')}}"
                      method="post">
                    @csrf
                    <p class="text-center mb-0">
                        Maili almadınız mı?
                        <button type="submit"
                                class="text-primary"
                                style="background: none;border: none"><b>Tekrar Gönder</b></button>
                    </p>
                </form>

            </div>
        </div>
        <!-- /Verify Email -->
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{asset('assets')}}/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('assets')}}/vendor/libs/popper/popper.js"></script>
<script src="{{asset('assets')}}/vendor/js/bootstrap.js"></script>
<script src="{{asset('assets')}}/vendor/libs/node-waves/node-waves.js"></script>
<script src="{{asset('assets')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('assets')}}/vendor/libs/hammer/hammer.js"></script>
<script src="{{asset('assets')}}/vendor/libs/i18n/i18n.js"></script>
<script src="{{asset('assets')}}/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="{{asset('assets')}}/vendor/js/menu.js"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{asset('assets')}}/js/main.js"></script>

<!-- Page JS -->
</body>
</html>
