<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiResponseController
{
    public function login(Request $request){

        $request->validate([
            'username' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $creadentials['email'] = request('username');
        $creadentials['password'] = request('password');

        if (!Auth::attempt($creadentials)) {
            return response()->json([
                'message' => "Crendenciales incorrectas"
            ], 401);
        }
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        return response()->json([
            'token' => "Bearer " . $tokenResult->accessToken,
        ]);
    }

    function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json([
            'message' => "se finalizo la sesion",
        ]);
    }
}
