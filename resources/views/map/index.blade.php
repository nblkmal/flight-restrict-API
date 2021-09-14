@extends('layouts.app-maps')

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

    .maps {
        /* margin-top: 75px; */
        height: 500px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-sm-12 text-center ">
            <h1><strong>Navigate Maps<strong></h1>
                <div class="card mt-5">
                    <div class="card-body maps p-0">
                        @include('map.map')
                    </div>
                </div>
        </div>
        
    </div>
</div>
@endsection
