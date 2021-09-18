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

    button, .btn {
        background-color: white !important;
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
                                    @if ($bank['NAME'] == 'Affin Bank')
                                        <img src="{{ asset('images/logo/affin.svg') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Alliance Bank')
                                        <img src="{{ asset('images/logo/alliance.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'AmBank')
                                        <img src="{{ asset('images/logo/ambank.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Bank Islam')
                                        <img src="{{ asset('images/logo/bankislam.svg') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Bank Muamalat')
                                        <img src="{{ asset('images/logo/muamalat.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Bank Rakyat')
                                        <img src="{{ asset('images/logo/rakyat.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'BSN')
                                        <img src="{{ asset('images/logo/bsn.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'CIMB Clicks')
                                        <img src="{{ asset('images/logo/cimb.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Hong Leong Bank')
                                        <img src="{{ asset('images/logo/hongleong.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'HSBC (Offline)')
                                        <img src="{{ asset('images/logo/hsbc.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'KFH')
                                        <img src="{{ asset('images/logo/kuwait.svg') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Maybank2E')
                                        <img src="{{ asset('images/logo/maybank2e.jpg') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Maybank2U')
                                        <img src="{{ asset('images/logo/maybank2u.gif') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'OCBC Bank')
                                        <img src="{{ asset('images/logo/ocbc.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Public Bank')
                                        <img src="{{ asset('images/logo/public.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'RHB Bank (Offline)')
                                        <img src="{{ asset('images/logo/rhb.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'Standard Chartered (Offline)')
                                        <img src="{{ asset('images/logo/standard.png') }}" width="180px" alt="">
                                    @elseif ($bank['NAME'] == 'UOB Bank')
                                        <img src="{{ asset('images/logo/uob.png') }}" width="180px" alt="">
                                    @endif

                                    <input type="hidden" name="billCode" value="{{ $billCode }}">
                                    <input type="hidden" name="bankID" value="{{ $bank['CODE'] }}">
                                    {{ $bank['NAME'] }}
                                    <button type="submit" class="float-right">
                                        <i class='bx bxs-right-arrow-circle bx-sm' style="color: #393E46"></i>
                                    </button>
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
