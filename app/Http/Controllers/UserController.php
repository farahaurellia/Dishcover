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
            'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg',
            'https://i.pinimg.com/236x/70/4d/1c/704d1c3f123cd304beb8fd12561d3ac2.jpg',
            'https://i.pinimg.com/236x/68/cf/ff/68cfff25d08b07229eee05857a98e261.jpg'
        ];
    
        $randomProfilePicture = $profilePictures[array_rand($profilePictures)];
    
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', 'min:8']
        ]);
    
        $incomingFields['profilepicture_url'] = $randomProfilePicture;
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
    
        $user = User::create($incomingFields);
    
        auth()->login($user);
    
        return redirect('/')->with('success', 'You have successfully created an account');
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

    public function addLike(){
        if (Auth::check()) {
            Like::create([
                'user_id' => Auth::id(),
                'recipe_id' => $id
            ]);
        }

        return back();
    }
    
    public function unLike(){
        
    }
}
