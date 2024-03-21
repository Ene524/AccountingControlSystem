@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

{{--    Doğru componenti çağır--}}
    <div class="row">
        <h2 class="mt-5">Şirket Seçimi</h2>
        Şirket seçimi yapılacak
    </div>

@endsection

@section('customStyle')
    @include('modules.dashboard.user-company-dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.user-company-dashboard.index.components.script')
@endsection
