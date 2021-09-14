@extends('layouts.app')

<style>
    .maps {
        height: 300px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="my-2" style="font-family: 'Poppins', sans-serif;">
                {{-- Guna permission --}}
                @role('admin')
                    <h2>Hi Admin! Welcome to Flight Restriction API</h2>

                @else
                    <h2>Hi {{ auth()->user()->name ?? 'everyone' }} ! Welcome to Flight Restriction API</h2>
                    <small>This is normal user</small>
                @endrole
            </div>
            <div>
                <h4 class="text-center my-3" style="font-family: 'Poppins', sans-serif;">About this API</h4>
                <div class="row justify-content-center my-3">
                    <div class="card px-3">
                        <div class="card-body text-center">
                            <div class="d-inline-flex align-items-center">
                                <i class='bx bxs-map-alt bx-lg mr-3' style='color:#434b57'></i>Collection of all flight restrict area in Malaysia
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="card px-3">
                        <div class="card-body text-center">
                            <div class="d-inline-flex align-items-center">
                                <i class='bx bxs-pin bx-lg mr-3' style='color:#434b57' ></i>Point coordinates of each places
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center my-3">
                    <div class="card px-3">
                        <div class="card-body text-center">
                            <div class="d-inline-flex align-items-center">
                                <i class='bx bx-shape-polygon bx-lg mr-3' style='color:#434b57' ></i>Polygon coordinates of each places
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
