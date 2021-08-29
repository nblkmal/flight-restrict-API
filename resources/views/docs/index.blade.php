@extends('layouts.app')

<style>
    .debug {
        border: 1px solid white !important;
    }

    .method {
        background-color: #393E46 !important;
        border-radius: 15px !important;
    }
</style>
@section('content')
<div class="container">
    <div class="row">
        <h1>HTTP Request</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background-color: none !important;">
                <div class="card-body p-0 ">
                    <div class="row method m-3 d-inline-flex align-items-center">
                        <button class="btn btn-outline-primary px-5">GET</button>
                        {{-- <p>The HTML <code>button</code> tag defines a clickable button.</p> --}}
                        <p class="m-0 ml-4">api/v1/places</p>
                    </div>
                </div>
            </div>
            <div class="card my-2" style="background-color: none !important;">
                <div class="card-body p-0 ">
                    <div class="row method m-3 d-inline-flex align-items-center">
                        <button class="btn btn-outline-primary px-5">GET</button>
                        {{-- <p>The HTML <code>button</code> tag defines a clickable button.</p> --}}
                        <p class="m-0 ml-4">api/v1/coordinates</p>
                        <i class='bx bx-user'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
