@extends('layouts.app')

@section('content')
<div class="container-fluid justify-content-center text-center">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('file:export_states') }}">
                        @csrf
                        <button class="btn btn-primary">Export States</button>
                    </form>
                    {{-- <a href="{{ route('file:export_states') }}" class="btn btn-primary">Export States</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 ">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif
                    <h2 class="mb-2" style="color: #414141; font-family: poppins; font-weight: bold;">
                        {{-- <i class="btn fas fa-angle-left fa-lg pr-4" onclick="window.location='{{ url()->previous() }}'"></i> --}}
                    Upload File For Places</h2>
                    <form action="{{ route('file:import_places') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                        {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 ">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-2" style="color: #414141; font-family: poppins; font-weight: bold;">
                        {{-- <i class="btn fas fa-angle-left fa-lg pr-4" onclick="window.location='{{ url()->previous() }}'"></i> --}}
                    Upload File For Coordinates</h2>
                    <form action="{{ route('file:import_coordinates') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import data</button>
                        {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
