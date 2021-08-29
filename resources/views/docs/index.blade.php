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
        border: none;
        color: #ffffff
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
                    <div class="row method m-3 align-items-center">
                        <button class="btn btn-outline-primary px-5">GET</button>
                        <input class="ml-4" type="text" id="url-places" value="api/v1/places" readonly>
                        <i class='bx bxs-copy box--end mr-4' onclick="myFunction('url-places')" data-toggle="tooltip" data-placement="top" title="Copy" type="button" style='color:#ffffff'  ></i>
                    </div>
                </div>
            </div>
            <div class="card my-2" style="background-color: none !important;">
                <div class="card-body p-0 ">
                    <div class="flex-row method m-3 align-items-center">
                        <button class="btn btn-outline-primary px-5">GET</button>
                        <input class="ml-4" type="text" id="url-coords" value="api/v1/coordinates" readonly>
                        <i class='bx bxs-copy box--end mr-4' onclick="myFunction('url-coords')" data-toggle="tooltip" data-placement="top" title="Copy" type="button" style='color:#ffffff'  ></i>
                    </div>
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
