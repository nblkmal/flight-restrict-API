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
    
    div.collapse {
        max-height: 400px;
        overflow: hidden;
        overflow-y: scroll;
    }

    .bank-item {
        max-height: 200px;
    }

    .collapse::-webkit-scrollbar {
        display: none;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <h1>Choose bank</h1>
        {{-- <small>Your billcode is {{ $billCode }}</small> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div id="accordion">
                <div class="card">
                    <div class="card-body" id="headingOne">
                        <h5 class="mb-0">
                            {{-- <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                            </button> --}}
                            <h3 type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Choose Bank</h3>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        @foreach ($banks as $bank)
                            <form action="{{ route('donate:pay') }}" method="get">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="billCode" value="{{ $billCode }}">
                                    <input type="hidden" name="bankID" value="{{ $bank['CODE'] }}">
                                    {{ $bank['NAME'] }}
                                    {{-- <button class="float-right">icon</button> --}}
                                    <i class='bx bxs-right-arrow-circle bx-sm float-right' style="color: #393E46"></i>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-sm-8 row">
            @foreach ($banks as $bank)
                <div class="col-sm-4">
                    <form action="{{ route('donate:pay') }}" method="get">
                        @csrf
                        <div class="card m-1">
                            <div class="card-body text-center">
                                <input type="hidden" name="billCode" value="{{ $billCode }}">
                                <input type="hidden" name="bankID" value="{{ $bank['CODE'] }}">
                                @if ($bank['NAME'] == 'Affin Bank')
                                    <div class="icon icon-affinbank"></div>
                                @elseif ($bank['NAME'] == 'CIMB Clicks')
                                    <div class="icon icon-cimb besars" style="color: white"></div>
                                @endif
                                
                                <p class="m-0">{{ $bank['NAME'] }}</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div> --}}
</div>
@endsection
