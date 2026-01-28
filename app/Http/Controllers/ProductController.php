<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('products.index');
    }

    public function list()
    {
        $products = Product::latest()->get();
        return response()->json($products);
    }

    public function create()
    {
        return view('products.create'); 
    }

    public function store(Request $request)
    {
        $images = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $name);
                $images[] = $name;
            }
        }
        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_image' => $images
        ]);
        //return redirect()->route('products.index')->with('success','Project created');
        return response()->json(['success' => 'Product added successfully']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);
        $images = $product->product_image;
        if (!empty($product->product_image)) {
            foreach ($product->product_image as $oldImage) {
                $oldPath = public_path('uploads/' . $oldImage);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }
        $images = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $name);
                $images[] = $name;
            }
        }
        $product->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_image' => $images
        ]);
        return response()->json(['success' => 'Product updated successfully']);
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['success' => 'Product deleted successfully']);
    }


}
