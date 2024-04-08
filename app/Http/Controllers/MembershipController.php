<?php

namespace App\Http\Controllers;

use App\Mail\SendMembership;
use App\Models\AskItem;
use Illuminate\Http\Request;
use App\Models\MembershipItem;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{
    //Show all requests
    public function index() {
        $items = MembershipItem::orderBy('created_at', 'asc')->get();
        return $items;
    }

    public function show($id) {
        return MembershipItem::findOrFail($id);
    }

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
            'terms' => 'required',
            'accepted' => 'required'
        ]
        );

        MembershipItem::create($formFields);
    }

        //Update single news
        public function update(Request $request, MembershipItem $news) {

            $formFields = $request->validate([ 
                'id' => 'required',
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
                'terms' => 'required',
                'accepted' => 'required'
            ]
            );
            $formFields['accepted'] = true;
            $item = MembershipItem::findOrFail($formFields['id']);
            $item->update($formFields);
        }

}
