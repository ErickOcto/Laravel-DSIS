<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerMobile($request)
    {
        $request->validated();

        $userData = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);
        $token = $user->createToken('forumapp')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function loginMobile(LoginRequest $request)
    {
        $request->validated();

        $user = User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Email atau password salah'
            ], 422);
        }

        $token = $user->createToken('forumapp')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function loginReact(Request $request){
        $user = $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if(!Auth::attempt($user)){
            return response()->json([
                'error' => ['message' => "You entered an invalid email or password"]
            ]);
        }

        $user = Auth::user();

        $token = auth()->user()->createToken('laravel_login')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logoutReact(Request $request){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => "Successfully logged out"
        ]);
    }
}
