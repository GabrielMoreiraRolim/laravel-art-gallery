<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Registrar ou logar com nickname
    public function login(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('nickname', $request->nickname)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json($user);
            } else {
                return response()->json(['error' => 'Senha incorreta'], 401);
            }
        }

        // Criar novo usuário se não existir
        $user = User::create([
            'nickname' => $request->nickname,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
    }
}
