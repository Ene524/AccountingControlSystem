@extends('layouts.master')
@section('title', 'Fatura Listesi')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">Faturalar</span>
    </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header d-flex justify-content-between align-items-center">Fatura Listesi
                    <a href="{{route('invoice.create')}}"
                       class="btn btn-primary">Yeni Fatura Ekle</a>
                </h5>

                <div class="card-body">
                    <div id="myGrid"
                         class="ag-theme-alpine"
                         style="height:500px"></div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.invoice.index.components.style')
@endsection

@section('customScript')
    @include('modules.invoice.index.components.script')
@endsection
