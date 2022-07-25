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
                    <form action="/orders" method="post">
                        @csrf

                        <div class="row">
                            <div class="row">
                                <h4>Order product</h4>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">Product name</label>

                                <input id="name"
                                       type="text"
                                       readonly class="form-control plaintext"
                                       name="name"
                                       value="{{ $product->name }}">
                            <div/>

                            <div class="form-group row">
                                <input id="product_id"
                                       type="hidden"
                                       name="product_id"
                                       value="{{ $product->id }}">
                            </div>

                            <div class="row">
                                <label for="quantity" class="col-md-4 col-form-label">Quantity</label>

                                <input id="quantity"
                                       type="text"
                                       class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                       name="quantity"
                                       value="1"
                                       autocomplete="quantity" autofocus>

                                @if ($errors->has('quantity'))
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                @endif
                            </div>

                            <div class="row">
                                <label for="client" class="col-md-4 col-form-label">Client name</label>

                                <input id="client"
                                       type="text"
                                       class="form-control{{ $errors->has('client') ? ' is-invalid' : '' }}"
                                       name="client"
                                       value="{{ old('client') }}"
                                       autocomplete="client" autofocus>

                                @if ($errors->has('quantity'))
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                @endif
                            </div>

                            <div class="row pt-4">
                                <button class="btn btn-primary">Buy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
