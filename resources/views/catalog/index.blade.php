@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <h2>Our products</h2>
           <hr>
       </div>

       <div class="row">
           @foreach($products as $product)
               <div class="p-1 col-6 col-sm-4 col-lg-3" style="border-style: hidden">
                   <a href="/details/{{ $product->id }}" class="text-decoration-none">
                       <img src="/images/{{ $product->image }}" class="w-100 h-75">
                       <hr>
                       <p>
                            <span class="font-weight-bold">
                                <span class="text-dark">{{ $product->name }}</span>
                            </span>
                       </p>
                       <p>Price:</p>
                       <p>
                           $ {{ $product->price }}
                       </p>
                   </a>
               </div>
           @endforeach
       </div>
   </div>
@endsection
