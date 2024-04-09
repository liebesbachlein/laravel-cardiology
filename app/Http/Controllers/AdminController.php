<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('app');
    }

    public function getLogin() {
        return view('app');
    }


    public function login(Request $request) {
        
        $formFields = $request->validate([ 
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            //$request->session()->regenerate();
            return response('Success', 200)
                  ->header('Content-Type', 'text/plain');
        } 

        return response('Error', 501)
                  ->header('Content-Type', 'text/plain');


    }

    public function logout(Request $request) {
        auth()->logout();
    }
}
