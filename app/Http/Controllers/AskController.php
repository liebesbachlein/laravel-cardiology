<?php

namespace App\Http\Controllers;

use App\Models\AskItem;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([ 
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'content' => ['required', 'max:3000'],
        ]);
        AskItem::create($formFields);
    }
}
