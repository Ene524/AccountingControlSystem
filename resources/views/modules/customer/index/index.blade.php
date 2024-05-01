@extends('layouts.master')
@section('title', 'Müşteri Listesi')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">Müşteriler/</span>Müşteri Listesi
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header d-flex justify-content-between align-items-center">Müşteri Listesi
                    <a href="{{route('customer.create')}}" class="btn btn-primary">Yeni Müşteri Ekle</a>
                </h5>

                <div class="card-body">
                    <div id="myGrid" class="ag-theme-alpine" style="height:500px"></div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.customer.index.components.style')
@endsection

@section('customScript')
    @include('modules.customer.index.components.script')
@endsection
