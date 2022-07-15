@extends('layouts.app')

@section('content')
   <div class="container">
      <div
      class="p-5 text-center bg-image"
      style="
         background-image: url('https://images.pexels.com/photos/956981/milky-way-starry-sky-night-sky-star-956981.jpeg?auto=compress&cs=tinysrgb&w=1500&h=750&dpr=1');
         height: 400px;
         ">
         <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
               <div class="text-white">
                  <h1 class="m-3">Ofir Web Shop</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container pt-5">
      <h2>Bestselling products</h2> 
   </div>
@endsection