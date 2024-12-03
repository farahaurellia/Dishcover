<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
    
        $user = User::create($incomingFields);

        auth()->login($user);
    
        return redirect('/')->with('success', 'You have succesfully created an account');
    }

    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have logged in');
        } else {
            return redirect('/')->with('failure', 'Invalid login');
        }
    }


    
}
