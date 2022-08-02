@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-8 offset-2">
            <h3>Product details</h3>
            <div class="col-6">
                <img src="/images/{{ $product->image }}" class="w-100">
            </div>
            <div class="col-6">
                <div>
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="font-weight-bold">
                                <p>{{ $product->name }}</p>
                            </div>
                            <div class="font-weight-light">
                                {{ $product->description }}
                            </div>
                            <div class="font-weight-light">
                                Price: $ {{ $product->price }}
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                @auth
                    @if(!Auth::user()->isAdmin())
                        <a href="{{ route('orders.store',[$product->id, $user->id]) }}" class="btn btn-primary">Buy product</a>
                    @endif

                    @if (Auth::user()->isAdmin())
                        <div>
                            <a href="{{ route('products.destroy',[$product->id]) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-primary">Edit</a>
                        </div>
                    @endif
                @else
                    <a href="{{ route('login',[$product->id]) }}" class="btn btn-primary">Please login</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
