@extends('layouts.master')
@section('title', 'Müşteri Listesi')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Müşteri Listesi</h5>


                <div class="card-body">
                    <div
                        id="myGrid"
                        class="ag-theme-alpine"
                        style="height:500px"
                    ></div>

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
