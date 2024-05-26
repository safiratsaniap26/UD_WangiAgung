<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $validateUser = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $login = request(['username','password']);

        if(!Auth::attempt($login)){
            return response()->json([
                'message' => 'Login gagal! Periksa Lagi Username dan Password Anda'
            ], 404);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('AccessToken');

        return response()->json([
            'token'         => $tokenResult->plainTextToken,
            'data' => [
                'username'      => $user->username,
                'name'          => $user->name,
                'email'         => $user->email,
            ]
        ],200);
    }

    public function show($id){
        
        $user = User::find($id);

        return response()->json([
            $user
        ],200);

    }
}
