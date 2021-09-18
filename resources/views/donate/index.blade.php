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
    <div class="row justify-content-center my-4">
        <div class="col-sm-8 text-center">
            <h1><strong>Proceed to donate me coffee money!<strong></h1>
        </div>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('donate:store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Amount</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                    </div>
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" name=amount>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                @error('amount')
                                    <div class="alert alert-danger">
                                        <small>
                                            {{ $message }}
                                        </small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" required>
                                <small id="emailHelp" class="form-text text-muted">So we can appreciate our donaters :)</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Phone <small>(Optional)</small></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="012xxxxxxx" name="phone">
                                <small id="emailHelp" class="form-text text-muted">Maybe we can do some collaboration :)</small>
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                        {{-- <input class="border border-white" type="text" placeholder="Enter amount" name="amount" required> --}}
                        <button type="submit" class="btn btn-primary btn-block">Donate!</button>
                    </form>
                </div>
            </div>
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
