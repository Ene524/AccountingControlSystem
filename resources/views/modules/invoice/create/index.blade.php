@extends('layouts.master')
@section('title', 'Fatura Ekle')
@section('content')

    <h4 class="py-1 mb-2">
        <span class="text-muted fw-light">
            <a href="{{ route('invoice.index') }}">Faturalar</a>
            /</span>
        Fatura ekle
    </h4>

    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form
                        action="{{ route('invoice.create') }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit"
                                        class="btn btn-primary float-end mx-2">Oluştur
                                </button>
                                <a href="{{ route('invoice.index') }}"
                                   class="btn btn-info float-end">Geri Dön
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.invoice.create.components.style')
@endsection

@section('customScript')
    @include('modules.invoice.create.components.script')
@endsection
