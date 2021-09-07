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
        <h1>Proceed to donate me coffee money!</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('donate:store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount" name="amount" required>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                <small id="emailHelp" class="form-text text-muted">So we can appreciate our donaters :)</small>
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        {{-- <input class="border border-white" type="text" placeholder="Enter amount" name="amount" required> --}}
                        <button type="submit" class="btn btn-primary">Donate!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 row">
            @foreach ($banks as $bank)
                <div class="col-sm-4">
                    <div class="card m-1" type="button">
                        <div class="card-body text-center">
                            <input type="hidden" value="{{ $bank['CODE'] }}">
                            {{-- if  --}}
                            @if ($bank['NAME'] == 'Affin Bank')
                                <div class="icon icon-affinbank"></div>
                            @elseif ($bank['NAME'] == 'CIMB Clicks')
                                <div class="icon icon-cimb besars" style="color: white"></div>
                            @endif
                            
                            <p class="m-0">{{ $bank['NAME'] }}</p>
                        </div>
                    </div>
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
