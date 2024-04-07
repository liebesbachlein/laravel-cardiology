<?php

namespace App\Http\Controllers;

use App\Models\EducationItem;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([ 
            'last_name' => ['required', 'max:255'],
            'first_name' => ['required', 'max:255'],
            'patro_name' => 'max:255',
            'email' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:30'],
            'speciality' => ['required', 'max:255'],
            'address_home' => ['required', 'max:255'],
            'address_work' => ['required', 'max:255'],
            'picked_month' => ['required', 'max:255'],
            'picked_time' => ['required', 'max:255'],
            'terms' => 'required'
        ]
        );

        EducationItem::create($formFields);
    }
}
