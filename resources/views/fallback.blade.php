@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Unauthorized Action') }}</div>
                <div class="card-body">
                    {{ __('Only admin users are allowed to login.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
