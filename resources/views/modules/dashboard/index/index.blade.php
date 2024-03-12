@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-12 col-md-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>0</h3>
                    <p>Personel</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Detay <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('customStyle')
    @include('modules.dashboard.index.components.style')
@endsection

@section('customScript')
    @include('modules.dashboard.index.components.script')
@endsection
