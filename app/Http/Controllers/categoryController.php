<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function AddCategory(Request $request){

        $formFields = $request->validate([
            'category_name' => ['required','min:3','unique:categories,category_name'],
            'category_image' => ['required']
        ]);      

        $formFields['category_image'] = $request->file('category_image')->store('images','public');
        
        Category::create($formFields);
        return redirect('/admin/add');
     }

     public function GetCategories(){
        $categories = Category::all();
        return view('pages.admin.add',compact('categories'));
     }
}