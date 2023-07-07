<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class Product_controller extends Controller
{
    public function add_data(Request $req){
        $formFields =$req->validate([
            'name'=>['required','min:3'],
            'price'=>['required','min:3'],
            'category'=>['required'],
            'image'=>'required',
        ]);
        $formFields['image'] = $req->file('image')->store('images','public');;
        
        Products::create($formFields);
        return back()->with('message','Product added Successfully');
    }

     public function GetProducts(){
        $products=Products::paginate(6);

        return view('pages.home',compact('products'));
     }

     


}