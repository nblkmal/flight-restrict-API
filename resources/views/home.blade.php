@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Flight Restriction API
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <passport-component></passport-component>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
