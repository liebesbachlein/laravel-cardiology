<?php

namespace App\Http\Controllers;

use App\Models\MembershipItem;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    //

    public function store(Request $request) {
    
        $formFields = $request->validate([
            'id' => 'required', 
            'last_name' => 'required',
            'first_name' => 'required',
            'patro_name',
            'email' => 'required',
            'phone_number' => 'required',
            'date_birth' => 'required',
            'place_birth' => 'required',
            'address' => 'required',
            'id_doc' => 'required',
            'date_doc' => 'required',
            'place_doc' => 'required',
            'education' => 'required', 
            'add_education' => 'required',
            'experience' => 'required',
            'interests' => 'required',
            'date_member' => 'required',
            'terms' => 'required'
        ]
        );

        MembershipItem::create($formFields);

        return redirect('/');
    }
}
