@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        @if ($companies->count() > 0)
            @foreach ($companies as $company)
                <div class="col-md-6 col-xl-4">
                    <div class="container mt-5">
                        <div class="justify-content-center">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">{{ $company->title }}</h5>
                                        <p class="card-text">Oluşturulma: {{ $company->created_at }}</p>
                                    </div>
                                    <a href="#" class="btn btn-primary">Firma Girişi</a>
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
                    <a href="#">
                        <div class="card" style="background-color: transparent;border: 2px dashed #CCC;height: 100px">
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
