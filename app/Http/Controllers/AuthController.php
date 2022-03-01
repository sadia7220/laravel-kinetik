<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
   
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        //$token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'response_code' => 201,
        //     'message' => 'Registered Successfully!',
        //     'token_type' => 'Bearer',
        //     'access_token' => $token,
        //     'data' => $user
        // ]);

        return $this->getResponse(201, 'Registered Successfully!', $user);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'response_code' => 200,
            'message' => 'Logged-in Successfully!',
            'token_type' => 'Bearer',
            'access_token' => $token,
            'data' => $user
        ]);
    }

    public function logout()
    {   
        $user = Auth::user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return $this->getResponse(200, 'Logout Successful');
    }

}
