@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Default</h5>
                <div class="card-body">
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="defaultFormControlInput"
                               placeholder="John Doe" aria-describedby="defaultFormControlHelp"/>
                        <div id="defaultFormControlHelp" class="form-text">
                            We'll never share your details with anyone else.
                        </div>
                    </div>
                </div>
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
