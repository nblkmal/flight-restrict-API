@extends('layouts.app-maps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Places Data</h2>
            <div class="card">
                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection

@push('stable-script')
    {!! $dataTable->scripts() !!}
@endpush
