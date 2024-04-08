@extends('layouts.Auth.LoginMaster')
@section('title', 'Dashboard')
@section('content')
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
         id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4"
               href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center"
             id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow"
                       href="javascript:void(0);"
                       data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/1.png') }}"
                                 alt
                                 class="h-auto rounded-circle"/>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item"
                               href="pages-account-settings-account.html">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}"
                                                 alt
                                                 class="h-auto rounded-circle"/>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{$user->name}}</span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="pages-profile-user.html">
                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="pages-account-settings-account.html">
                                <i class="ti ti-settings me-2 ti-sm"></i>
                                <span class="align-middle">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="pages-account-settings-billing.html">
                                <span class="d-flex align-items-center align-middle">
                                    <i class="flex-shrink-0 ti ti-credit-card me-2 ti-sm"></i>
                                    <span class="flex-grow-1 align-middle">Billing</span>
                                    <span
                                        class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="pages-faq.html">
                                <i class="ti ti-help me-2 ti-sm"></i>
                                <span class="align-middle">FAQ</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="pages-pricing.html">
                                <i class="ti ti-currency-dollar me-2 ti-sm"></i>
                                <span class="align-middle">Pricing</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('user.logout') }}">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>


    </nav>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <h4 class="py-3 text-center">Firma Listesi</h4>

            @if ($response->getData())
                @foreach ($response->getData() as $company)
                    <div class="col-md-6 col-xl-4">
                        <div class="container mt-5">
                            <div class="justify-content-center">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <form action="{{route('dashboard.selectCompany')}}"
                                              method="post">
                                            @csrf
                                            <div>
                                                <input type="hidden" name="company_id" value="{{$company->id}}">
                                                <h5 class="card-title">{{ $company->title }}
                                                    <a href="#"
                                                       class="deleteCompany"
                                                       style="position:absolute;top:10px;right:10px;"
                                                       data-id="{{ $company->id }}"
                                                    >
                                                        <i class="fa fa-trash text-black-50"></i>
                                                    </a>
                                                </h5>
                                                <p class="card-subtitle">{{$company->is_person ? 'Tckn : '.$company->identity_number :'Vkn : '.$company->tax_number }}</p>
                                                <p class="card-text">Oluşturulma:
                                                    {{ \Carbon\Carbon::parse($company->created_at)->format('d.m.Y') }}</p>

                                            </div>
                                            <button class="btn btn-success">Seç</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="col-md-6 col-xl-4">
                <div class="container mt-5">
                    <div class="justify-content-center">
                        <a href="{{ route('dashboard.showCreateCompany') }}">
                            <div class="card"
                                 style="background-color: transparent;border: 2px dashed #CCC;height: 161.81px">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    + Firma Oluştur
                                </div>
                            </div>
                        </a>
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
