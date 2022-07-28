@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex text-center">
            <div class="col-md-8 mx-auto">
                <h3>{{ $message->status }}</h3>
            </div>
            <div class="col-md-8 mx-auto">
                <h5>{{ $message->message }}</h5>
            </div>
            <div class="col-md-8 mx-auto">
                <a href="/" class="btn btn-warning"><<<< Return home</a>
                <a href="/products/" class="btn btn-primary">Continue shopping >>>></a>
            </div>
        </div>
    </div>
@endsection
