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
        <h1>Choose bank</h1>
        <small>Your billcode is {{ $billCode }}</small>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 row">
            @foreach ($banks as $bank)
                <div class="col-sm-4">
                    <form action="{{ route('donate:pay') }}" method="get">
                        @csrf
                        <div class="card m-1">
                            <div class="card-body text-center">
                                <input type="hidden" name="billCode" value="{{ $billCode }}">
                                <input type="hidden" name="bankID" value="{{ $bank['CODE'] }}">
                                {{-- if  --}}
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
    </div>
    
    <script>
        function myFunction(url) {
            /* Get the text field */
            var copyText = document.getElementById(url);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        }
    </script>
</div>
@endsection
