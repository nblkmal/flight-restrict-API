@extends('layouts.app')

<style>
    .debug {
        border: 1px solid white !important;
    }

    .method {
        background-color: #393E46 !important;
        border-radius: 15px !important;
    }

    .flex-row {
        width: auto;
        display: flex; 
        flex-direction: row; 
    }

    .box--end {
        margin-left: auto;
    }

    input {
        background: transparent;
        /* border: white; */
        color: #ffffff
    }
    
    @font-face {
        font-family: OptimusPrinceps;
        src: url('{{ public_path('fonts/bankmy.tff') }}');
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <h1>Seems like theres an error in your transaction. Please try again</h1>
        <h3>Click here to redirect {{ $donate->payment_link }}</h3>
    </div>
</div>
@endsection
