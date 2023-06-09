<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\usuario;

class LoginController extends Controller
{

    public function show(){
        return view('login');
    }

    //Función para iniciar sesión
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {

            

            $usuario = usuario::where('email', '=', $request->input('email'))
                ->first();

            switch($usuario->id_tipo) {
                case 1:
                    return redirect('home')->with('message', 'Se ha logeado un gerente');
                    break;
                case 2:
                    return redirect('home')->with('message', 'Se ha logeado una secretaria');
                    break;
                case 3:
                    return redirect('principal')->with('message', 'Se ha logeado un trabajador');
                    break;
            }
        } else {

            return redirect('login')->with('message', 'No se ha logeado');
        }
    }

    //Función para salir de la sesión
    public function logout(Request $request)
    {
        try {

            Auth::logout();

            redirect('login')->with('message', 'Se ha cerrado la sesión');
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
