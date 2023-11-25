<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  index(){
        // $products = Product::get();
        $products = Product::latest()->paginate(5);

        return view('products.index', ['products'=> $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:png,jpg,jpeg,gif|max:1000'

        ]);

        //uploading image...
       $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
       
        $product = new Product;
        $product->name = $request->name;
        $product->image = $imageName;
        $product->description = $request->description;

        $product->save();

        return redirect(route('product.index'))->with('success', 'product create successful...!');
    }


    public function editProduct($id){
        $product = Product::Where('id',$id)->first();
        return view('products.edit',['product'=> $product]);
    }

    public function updateProduct(Request $request, $id){
   
        //validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:1000'

        ]);

        $product = Product::where('id', $id)->first();

        if(isset($request->image)){
          
            //uploading image...
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->with('success', 'product Updated successful...!');

    }

    public function destroy($id){
        $product = Product::Where('id',$id)->first();
        $product->delete();

        return redirect(route('product.index'))->with('success', 'product delete successful...!');

    }

    public function show($id){
        $product = Product::Where('id',$id)->first();

        return view('products.show', ['product'=> $product]);

    }
}
