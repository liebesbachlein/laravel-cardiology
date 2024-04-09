<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Mail\MembershipMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MembershipMailController extends Controller
{
    public function index(){
        return view ('mailMembership');
    }


    public function sendMail(Request $request)
    {
        $data = array( 
            'last_name'=>$request-> last_name,
            'first_name'=>$request-> first_name,
            'patro_name'=>$request-> patro_name,
            'email'=>$request-> email,
            'phone_number'=>$request-> phone_number,
            'date_birth'=>$request-> date_birth,
            'place_birth'=>$request-> place_birth,
            'address'=>$request-> address,
            'id_doc'=>$request-> id_doc,
            'date_doc'=>$request-> date_doc,
            'place_doc'=>$request-> place_doc,
            'education'=>$request-> education,
            'add_education'=>$request-> add_education,
            'experience'=>$request-> experience,
            'interests'=>$request-> interests,
            'date_member'=>$request-> date_member,
            'terms'=>$request-> terms
        );
        
        Mail::to('gerardinearmstrong@gmail.com')->queue(new MembershipMail($data));
        //Mail::to('aigerim.tuishieva@nu.edu.kz')->later(now()->addMinutes(10), new MembershipMail($data));

        //
        //Mail::to($request->user())->queue(new ConfirmationMail($data));

    }
}
