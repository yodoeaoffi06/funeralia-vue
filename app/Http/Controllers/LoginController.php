<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\usuario;

class LoginController extends Controller
{
    //Función para iniciar sesión
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if ($token = Auth::attempt($credentials)) {

            return response()->json(['token' => $token], 200);
        } else {

            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }
    }

    //Función para salir de la sesión
    public function logout(Request $request)
    {
        try {
            auth()->logout();

            return response()->json(['message' => 'Logout exitoso'], 200);
        } catch (Exception $e) {

            return response()->json(['error' => 'Error al hacer logout'], 500);
        }
    }

    //--Funciones para el auth--
    private function guard()
    {

        return Auth::guard();
    }

    public function refresh()
    {

        if (Auth::check()) {

            if ($token = $this->guard()->refresh()) {

                return response()->json([
                    'status' => 'successs',
                    'token'=> $token, 'code' => 200
                ])->header('Authorization', $token);
            }
        }
    }
}
