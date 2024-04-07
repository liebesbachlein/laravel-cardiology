<?php

namespace App\Http\Controllers;

use App\Mail\AskMail;
use App\Mail\SendMembership;
use App\Models\AskItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AskMailController extends Controller
{
    public function index(){
        return view ('mailAsk');
    }


    public function sendMail(Request $request)
    {
        $data = array( 
            'name'=>$request->name,
            'email'=>$request->email,
            'content'=>$request->content
        );
        //mail("gerardinearmstrong@gmail.com","My subject", $data);
        Mail::to('gerardinearmstrong@gmail.com')->queue(new AskMail($data));
        //Mail::to($request->user())->send(new SendMembership($item));

    }
}
