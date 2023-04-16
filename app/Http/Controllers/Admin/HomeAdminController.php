<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Validator;

class HomeAdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.user.login');
    }

    public function loginstore(Request $request){
        // dd($request);
        // $remember = isset($request->input('remember'))?true:false;
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('dashboard');
        }
        Session::flash('error', 'Email or Password is incorrect');
        return redirect()->back();
    }
}
