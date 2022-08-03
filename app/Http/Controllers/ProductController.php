<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]*(\.[0-9]+)$/',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $imageName = $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $image = Image::make(public_path("images/{$imageName}"))->fit(1000,1776);
        $image->save();

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
        ]);

        return redirect('/products')->with('message', 'Product created successfully!!!');

    }


    public function show(Product $product)
    {
        if($product->id == null){
            $product = Product::first();
            return view('products.show', compact('product'));

        }else{
            return view('products.show', compact('product'));

        }
    }


    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));

    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]*(\.[0-9]+)$/',
            'image' => 'sometimes|mimes:jpg,jpeg,png',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if(request()->has('image')){
            unlink(public_path("images/".$product->image));

            $imageName = $request->name . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $image = Image::make(public_path("images/{$imageName}"))->fit(1000,1776);
            $image->save();

            $product->image = $imageName;
        }

        $product->update();

        return redirect('/products')->with('message', 'Product updated successfully!!!');
    }


    public function destroy($id)
    {
        $product = Product::find($id);

        unlink(public_path("images/".$product->image));

        Product::where('id', $id)->delete();

        return redirect('/products')->with('message','Product deleted successfully');
    }
}
