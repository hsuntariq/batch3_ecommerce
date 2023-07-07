<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

        public function SignUp(Request $req){
            $formFields = $req->validate([
                'username' => ['required','min:3'],
                'email' => ['required','email'],
                'password' => ['required','min:6'],
                'image' => ['required'],
            ]);
            $formFields['image'] = $req->file('image')->store('images','public');
            $user = User::create($formFields);
            auth()->login($user);
            return redirect('/')->with('message','Welcome ' . auth()->user()->name );
        }

        public function SignOut(Request $req){
            auth()->logout();
            $req->session()->invalidate();
            return redirect('/login')->with('Hope to see you again!');
        }


        public function SignIn(Request $req) {
            $formFields = $req->validate([
                'email' => ['required','email'],
                'password' => ['required','min:6'],
            ]);

            if(auth()->attempt($formFields)){
                $req->session()->regenerate();
                return redirect('/')->with('message','Welcome Back' . auth()->user()->username);
            }

        }


}