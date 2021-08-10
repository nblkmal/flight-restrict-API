@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create your personal access token to gain access to our API
                </div>
                <div class="card-body">
                    <passport-component></passport-component>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
