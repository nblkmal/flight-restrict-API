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
            <h4 class="text-center mt-3" style="font-family: 'Poppins', sans-serif;">About this API</h4>
            <ul>
                <li>Collection of all flight restrict area in Malaysia</li>
            </ul>
        </div>
    </div>
</div>
@endsection
