<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($slug){
        $product =Product::where('slug',$slug)->first();
        $user_id=Auth::id();
        $cart_items=Cart::where('user_id',$user_id)->get();
        $exProducts =[];
        foreach ($cart_items as $item) {
            if ($item->product_id === $product->id) {
                array_push($exProducts,$item->product_id);
                $item->increment('quantity');
                print_r($exProducts);
            }
        }
        if(!in_array($product->id,$exProducts)){
            Cart::create([
                'product_id'=>$product->id,
                'user_id'=>$user_id
            ]);
        }
        return redirect()->back();
    }
    public function deleteFromCart($id){
        Cart::destroy($id);
        return redirect()->back();
    }
}
