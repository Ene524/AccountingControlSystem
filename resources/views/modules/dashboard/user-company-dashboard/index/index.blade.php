@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <h5 class="card-header">Custom Option Radios With Icons</h5>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                              <span class="custom-option-body">
                                <i class="ti ti-rocket"></i>
                                <span class="custom-option-title">Starter</span>
                                <small> Cake sugar plum fruitcake I love sweet roll jelly-o.</small>
                              </span>
                                    <input name="customOptionRadioIcon" class="form-check-input" type="radio" value=""
                                           id="customRadioIcon1" checked="">
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                              <span class="custom-option-body">
                                <i class="ti ti-rocket"></i>
                                <span class="custom-option-title">Starter</span>
                                <small> Cake sugar plum fruitcake I love sweet roll jelly-o.</small>
                              </span>
                                    <input name="customOptionRadioIcon" class="form-check-input" type="radio" value=""
                                           id="customRadioIcon1" checked="">
                                </label>
                            </div>
                        </div>
                        <div class="col-md mb-2">
                            <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                              <span class="custom-option-body">
                                <i class="ti ti-rocket"></i>
                                <span class="custom-option-title">Starter</span>
                                <small> Cake sugar plum fruitcake I love sweet roll jelly-o.</small>
                              </span>
                                    <input name="customOptionRadioIcon" class="form-check-input" type="radio" value=""
                                           id="customRadioIcon1" checked="">
                                </label>
                            </div>
                        </div>



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
