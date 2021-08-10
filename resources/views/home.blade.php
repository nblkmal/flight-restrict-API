@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="my-2" style="font-family: 'Poppins', sans-serif;">
                @role('admin')
                    <h2>Hi Admin! Welcome to Flight Restriction API</h2>

                @else
                    <h2>Hi {{ auth()->user()->name }} ! Welcome to Flight Restriction API</h2>

                @endrole
            </div>
            <div>
                <h4 class="text-center my-3" style="font-family: 'Poppins', sans-serif;">About this API</h4>
                <div class="row">
                    <div class="col-4 card">
                        <div class="card-body text-center">
                            Collection of all flight restrict area in Malaysia
                        </div>
                    </div>
                    <div class="col-4 card">
                        <div class="card-body text-center">
                            Point coordinates of each places
                        </div>
                    </div>
                    <div class="col-4 card">
                        <div class="card-body text-center">
                            Polygon coordinates of each places
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
