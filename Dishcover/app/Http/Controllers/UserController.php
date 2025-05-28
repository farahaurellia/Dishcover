<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\History;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(Request $request) {
        $profilePictures = [
            '/images/profile1.jpg',
            '/images/profile2.jpg',
            '/images/profile3.jpg',
            '/images/profile4.jpg',
            '/images/profile5.jpg',
            '/images/profile6.jpg',
            '/images/profile7.jpg',
            '/images/profile8.jpg',
            '/images/profile9.jpg',
            '/images/profile10.jpg',
            '/images/profile11.jpg',
            '/images/profile12.jpg'
        ];
    
        $randomProfilePicture = $profilePictures[array_rand($profilePictures)];
    
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', 'min:8']
        ]);
    
        $incomingFields['profilepicture_url'] = $randomProfilePicture;
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
    
        $user = User::create($incomingFields);
    
        auth()->login($user);
    
        return redirect('/')->with('success', 'You have successfully created an account');
    }
    

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have logged in');
        } else {
            return back()->withErrors(['loginerror' => 'Invalid username or password.'])->with('showLoginModal', true);
        }
    }


    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out');
    }

    public function like(){
        $id = Auth::id();

        $recipeIds = Like::where('user_id', $id)->pluck('recipe_id');

        $recipes = Recipe::whereIn('id', $recipeIds)->get();

        return view('like', compact('recipes'));
    }

    public function history(){
        $id = Auth::id();

        $recipeIds = History::where('user_id', $id)->pluck('recipe_id');

        $recipes = Recipe::whereIn('id', $recipeIds)->get();

        return view('history', compact('recipes'));
    }

    public function myrecipe(){
        $id = Auth::id();

        $recipes = Recipe::where('user_id', $id)->get();

        return view('myrecipe', compact('recipes'));

    }
}
