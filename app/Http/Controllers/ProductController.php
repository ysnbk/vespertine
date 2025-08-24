<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request, $category=null)
    {
        if (isset($category)) {
            if($request->has("search")){
                $products = Product::where("category", $category)
                ->where("name", "LIKE", "%$request->search%")
                ->get();

            }else {
                $products = Product::where("category", $category)->get();
            }
        }else if ($request->has("search")) {
            if (isset($category)) {
                $products = Product::where("category", $category)
                ->where("name", "LIKE", "%$request->search%")
                ->get();
            }else{
                $products = Product::where("name", "LIKE", "%$request->search%")->get();
            }
        }else{
            $products = Product::all();

        }
        return view('index', compact('products','category'));
    }
    public function home(){
        $products =Product::inRandomOrder()->limit(3)->get();
        return view('home',compact("products"));
        
    }
}
