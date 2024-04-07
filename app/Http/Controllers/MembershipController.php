<?php

namespace App\Http\Controllers;

use App\Mail\SendMembership;
use App\Models\AskItem;
use Illuminate\Http\Request;
use App\Models\MembershipItem;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{

    public function store(Request $request) {
        $formFields = $request->validate([ 
            'last_name' => ['required', 'max:255'],
            'first_name' => ['required', 'max:255'],
            'patro_name' => 'max:255',
            'email' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:30'],
            'date_birth' => ['required', 'max:10'],
            'place_birth' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'id_doc' => ['required', 'max:10'],
            'date_doc' => ['required', 'max:10'],
            'place_doc' => ['required', 'max:255'],
            'education' => ['required', 'max:3000'],
            'add_education' => ['max:3000'],
            'experience' => ['max:3000'],
            'interests' => ['max:3000'],
            'date_member' => ['required', 'max:10'],
            'terms' => 'required'
        ]
        );

        MembershipItem::create($formFields);
    }

}
