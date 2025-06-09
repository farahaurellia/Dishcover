<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $profilePictures = [
            '/images/profile1.jpg',
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

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profilepicture_url' => $profilePictures[array_rand($profilePictures)]
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('username', $request->username)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}
