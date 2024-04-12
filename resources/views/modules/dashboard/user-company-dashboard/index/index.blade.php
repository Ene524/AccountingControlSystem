@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

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
                                            <input type="hidden"
                                                   name="company_id"
                                                   value="{{$company->id}}">
                                            <h5 class="card-title">{{ $company->title }}
                                                <a href="#"
                                                   class="deleteCompany"
                                                   style="position:absolute;top:10px;right:10px;"
                                                   data-id="{{ $company->id }}"
                                                >
                                                    <i class="fa fa-trash text-secondary"></i>
                                                </a>

                                                <a href="{{route('dashboard.editCompany', ['id' => $company->id])}}"
                                                   style="position:absolute;top:50px;right:10px;"
                                                >
                                                    <i class="fa fa-edit text-secondary"></i>
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

@endsection

@section('customStyle')
    @include('modules.dashboard.user-company-dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.user-company-dashboard.index.components.script')
@endsection
