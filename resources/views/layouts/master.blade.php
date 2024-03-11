<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
      data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Basic Inputs - Forms | Vuexy - Bootstrap Admin Template</title>

    <meta name="description" content=""/>


    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}"/>


    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}/"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>


<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.sidebar')

        <div class="layout-page">
            @include('layouts.navbar')


            <div class="content-wrapper">


                <div class="container-xxl flex-grow-1 container-p-y">
                    {{--<h4><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>--}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Default</h5>
                                <div class="card-body">
                                    <div>
                                        <label for="defaultFormControlInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="defaultFormControlInput"
                                               placeholder="John Doe" aria-describedby="defaultFormControlHelp"/>
                                        <div id="defaultFormControlHelp" class="form-text">
                                            We'll never share your details with anyone else.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
</div>


<script src="{{asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{asset('assets/vendor/js/menu.js')}}"></script>


<script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
