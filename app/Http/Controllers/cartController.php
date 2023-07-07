<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addToCart(Request $request) {
        $formFields = $request->validate([
            'product_name' => ['required'],
            'product_price' => ['required'],
            'product_image' => ['required'],
            'product_quantity' => ['required'],
        ]);
        
       $formFields['user_id'] = auth()->user()->id;
        
        Cart::create($formFields);
        
        return back()->with('message', 'Product added to cart successfully');
        
    }

    public function getCartItems(){
        $user = auth()->user()->id;
        $cartItems = Cart::where('user_id',$user)->get();
        return view('pages.cart',compact('cartItems'));

    }

}