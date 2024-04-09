<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function storeAdmin(Request $request) {
        $formFields = $request->validate([ 
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required',
            'name' => 'required',
            'user_type' => 'required'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);
        
        return response('Success', 200);
    }

}
