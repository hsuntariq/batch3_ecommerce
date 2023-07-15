<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function getOrders(){
        $orders = Order::all();
        return view('pages.admin.order',compact('orders'));
    }
    public function updateStatus(Request $req,$id){
        $order = Order::findOrFail($id);
        
        if($req->input('status') === 'Rejected'){
            $order->delete();
        }else{
            $order->update([
                'status' => $req->input('status')
            ]);
        }
        return back();
    }
}