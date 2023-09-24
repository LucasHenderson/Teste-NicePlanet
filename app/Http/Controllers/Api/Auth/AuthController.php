<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\RegistrarRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(AuthRequest $request){
        //dto para pegar apenas os campos necessarios
        $credentials = $request->only([
            'email',
            'password',
            'device_name'
        ]);

        //consulta no banco para varificar email (OBS: para a busca no primeiro que encontrar)
        $user = User::where('email', $credentials['email'])->first();

        //caso nao tenha encontrado o email
        if (!$user){
            return response()->json([
                'message' => "Email e(ou) senha incorreto(s)!"
            ], 403);
        }

        //verifica a senha criptografada
        $checkPassword = Hash::check($credentials['password'], $user->password);

        //caso a senha esteja errada
        if (!$checkPassword){
            return response()->json([
                'message' => "Email e(ou) senha incorreto(s)!"
            ], 403);
        }

        //OBS: foi feita essa analise de email e senha separados pq o email poderia vir "null"

        //deleta todos os tokens q esse user tenha feito antes, para ficar com apenas 1
        $user->tokens()->delete();

        //gera o token baseado no device_name
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

    public function store(RegistrarRequest $request){
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        try {
            $user->save();
            return response()->json([
                'message' => "Registro feito com sucesso!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
