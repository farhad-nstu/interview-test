<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use Illuminate\Support\Str;
class ProductsController extends Controller
{
    public function index(){
    	return Product::orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request){

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category_id = $request->$category_id;

        $product->save();
        return $product;
    } 

    public function show($id){
    	return response()->json(Product::find($id));
    }


    public function destroy($id){
    	try {
    		Product::destroy($id);
    		return response([], 204);
    	} catch(\Exception $e) {
    		return response(['Problem Deleting the Product', 500]);
    	}
    }   	
}
