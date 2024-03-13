@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <h2 class="mt-5">Şirket Seçimi</h2>

        {{//TODO 1: Şirket seçimi yapılacak. Şirket seçimi yapıldıktan sonra şirketin dashboard'u gösterilecek.}}
    </div>

@endsection

@section('customStyle')
    @include('modules.dashboard.user-company-dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.user-company-dashboard.index.components.script')
@endsection
