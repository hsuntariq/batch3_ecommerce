<?php

namespace App\Http\Controllers;

use App\Mail\cartMail;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function sendMail(Request $req){
        $user = auth()->user()->id;
        $cartItems = Cart::where('user_id',$user)->get();
        $userData = [
            'id' => auth()->user()->id,
            'name' => auth()->user()->username,
            'email' => auth()->user()->email,
        ];

        foreach($cartItems as $item){
            Order::create([
                'name' => $item->product_name,
                'price' => $item->product_price,
                'quantity' => $item->product_quantity,
                'image' => $item->product_image,
                'user_id' => auth()->user()->id,
            ]);
        }

        
        Mail::to('test@mail.com')->send(new cartMail($cartItems,$userData));
        return back();
    }
}