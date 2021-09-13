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

    kbd {
        background-color: #393E46 !important;
        padding: 0.5rem 0.5rem !important;
    }

    .link {
        /* border: #393E46 solid 1px !important; */
        background-color: #e2e2e2;
        padding: 0.3rem !important;
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
                        <button class="btn px-5">GET</button>
                        <input class="ml-4" type="text" id="url-places" value="api/v1/getPlaces" readonly>
                        <i class='bx bxs-copy box--end mr-4' onclick="myFunction('url-places')" data-toggle="tooltip" data-placement="top" title="Copy" type="button" style='color:#ffffff'  ></i>
                    </div>
                </div>
            </div>
            <div class="card my-2" style="background-color: none !important;">
                <div class="card-body p-0 ">
                    <div class="flex-row method m-3 align-items-center">
                        <button class="btn px-5">GET</button>
                        <input class="ml-4" type="text" id="url-coords" value="api/v1/getCoordinates" readonly>
                        <i class='bx bxs-copy box--end mr-4' onclick="myFunction('url-coords')" data-toggle="tooltip" data-placement="top" title="Copy" type="button" style='color:#ffffff'  ></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    
                    <p>For Laravel usage, please get an API Token to get your personal token.</p>
                    <p>Refer to this documentation <a class="link rounded-link" href="https://laravel.com/docs/8.x/http-client">Laravel HTTP Client</a></p>
                    
                    <p>
                        <kbd>
                            $response = Http::withHeaders([ 'Accept' => 'application/json',
                        </kbd>
                    </p>
                    <p><kbd class="">'Authorization' => 'Bearer <--Personal Access Token-->']);</kbd></p>
                    <p><kbd>->get('http://example.com');</kbd></p>
                    
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
