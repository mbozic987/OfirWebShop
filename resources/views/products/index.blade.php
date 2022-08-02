@extends('layouts.app')

@section('content')
   <div class="container">
       @if(session()->has('message'))
           <div class="alert alert-success">
               {{ session()->get('message') }}
           </div>
       @endif
       <div class="row">
           <div class="col-10">
               <h2>Our products</h2>
           </div>
           <div class="col-2">
               @auth
                   @if(Auth::user()->isAdmin())
                       <a class="btn btn-info float-end" href="{{ route('products.create') }}">Create new product</a>
                   @endif
               @endauth
           </div>
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
                   @auth
                       @if(!Auth::user()->isAdmin())
                       <a href="{{ route('products.show',[$product->id]) }}" class="btn btn-primary">Buy product</a>
                       @endif

                       @if (Auth::user()->isAdmin())
                           <div>
                               <a href="{{ route('products.destroy',[ $product->id]) }}"
                                  class="btn btn-danger"
                                  onclick="event.preventDefault();
                                            document.getElementById('products.destroy{{ $product->id }}').submit();"
                                  title="Delete {{ $product->name }}?">Delete
                               </a>
                               <form id="products.destroy{{ $product->id }}"
                                     action="{{ route('products.destroy', [$product->id]) }}"
                                     method="POST" style="display: none;" >
                                   @csrf
                                   @method('delete')
                               </form>
                               <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-primary">Edit</a>
                           </div>
                       @endif
                   @endauth
               </div>
           @endforeach
       </div>
   </div>
@endsection
