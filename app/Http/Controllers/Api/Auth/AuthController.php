<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(AuthRequest $request){
        $credentials = $request->only([
            'email',
            'password',
            'device_name'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user){
            return response()->json([
                'message' => "Email e(ou) senha incorreto(s)!"
            ], 403);
        }

        $checkPassword = Hash::check($credentials['password'], $user->password);

        if (!$checkPassword){
            return response()->json([
                'message' => "Email e(ou) senha incorreto(s)!"
            ], 403);
        }

        //deleta todos os tokens q esse user tenha feito antes, para ficar com apenas 1
        $user->tokens()->delete();

        $token = $user->createToken($credentials['device_name'])->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => "Logout feito com sucesso!"
        ], 200);
    }
}
