<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Alert;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);

        if( auth()->attempt(array('name'=>$input['name'], 'password'=>$input['password'])) ){

            if( auth()->user()->role == 1 ){
                return redirect()->route('home');
            }
            elseif( auth()->user()->role == 2 ){
                return redirect()->route('home');
            }
    
            }else{
                return redirect()->route('login')->with('Alert','Username atau Email, Salah !');
            }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
