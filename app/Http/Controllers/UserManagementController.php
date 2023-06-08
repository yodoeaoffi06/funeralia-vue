<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\usuario;
use App\Models\gerente;
use App\Models\secretaria;
use App\Models\trabajador;
use App\Models\tipo_usuario;

class UserManagementController extends Controller
{
    //función que crea un nuevo usuario y crea un usuario del tipo asignado en la base de datos.
    public function createUser(Request $request)
    {

        try {

            $rules = [
                'nombre'    => 'required|string',
                'ap_pat'    => 'required|string',
                'ap_mat'    => 'required|string',
                'telefono'  => 'required|string',
                'id_tipo'   => 'required|int'   ,
                'email'     => 'required|string',
                'password'  => 'required|string',
                
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                //$response['data'] = $validator->messages();
                return response()->json(array('message' => $validator->messages()), 400);
            }

            $usuario = new usuario();

            $usuario->nombre     = $request->nombre;
            $usuario->ap_pat     = $request->ap_pat;
            $usuario->ap_mat     = $request->ap_mat;
            $usuario->telefono   = $request->telefono;
            $usuario->id_tipo    = $request->id_tipo;
            $usuario->email      = $request->email;
            $usuario->password = bcrypt($request->password);


            if($usuario->save()) {

                switch($usuario->id_tipo) {

                    case 1:
                        $gerente = new gerente();

                        $gerente->id_usuario = $usuario->id_usuario;

                        $gerente->save();
                        break;

                    case 2:
                        $secretaria = new secretaria();

                        $secretaria->id_usuario = $usuario->id_usuario;

                        $secretaria->save();
                        break;

                    case 3:
                        $trabajador = new trabajador();

                        $trabajador->id_usuario = $usuario->id_usuario;

                        $trabajador->save();
                        break;
                }

                return response()->json(['message' => 'Se ha creado un nuevo usuario'], 200);
            } else {

                return response()->json(['message' => 'No se ha podido crear un nuevo usuario'], 400);
            }
        } catch (Exception $e) {

            return response()->json(['exception' => $e], 400);
        }
    }

    //función para eliminar o remover un usuario dado
    public function removeUser($id_usuario)
    {

        try {

            $usuario = usuario::where('id_usuario', $id_usuario)
                ->first();

            if($usuario) {

                $usuario->delete();

                return response()->json(['message' => 'Se ha removido al usuario'], 200);
            } else {

                return response()->json(['message' => 'No se encontró al usuario dado'], 400);
            }
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }

    //Función que actualiza un usuario dado
    public function updateUser(Request $request, $id_usuario)
    {

        try {
            $usuario = usuario::where('id_usuario', $id_usuario)
                ->first();

            if($usuario) {

                if($request->nombre) {

                    $usuario->nombre = $request->nombre;
                }

                if($request->ap_pat) {

                    $usuario->ap_pat = $request->ap_pat;
                }

                if($request->ap_mat) {

                    $usuario->ap_mat = $request->ap_mat;
                }

                if($request->telefono) {

                    $usuario->telefono = $request->telefono;
                }

                if($request->email) {

                    $usuario->email = $request->email;
                }

                if($request->password) {

                    $usuario->password = bcrypt($request->password);
                }

                $usuario->save();

                return response()->json(['message' => 'Se ha actualizado al usuario'], 200);
            } else {

                return response()->json(['message' => 'No se encontró al usuario dado'], 400);
            }
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }

    //Función para obtener los usuarios dependiendo su tipo, se mandar un 0 por parámetro, obtienes todos los usuarios
    public function getUsers($id_tipo)
    {

        try {

            $usuarios = null;

            if($id_tipo != 0) {

                $usuarios = usuario::select(
                    'id_usuario',
                    'nombre',
                    'ap_pat',
                    'ap_mat',
                    'telefono',
                    'email'
                )->where('id_tipo', $id_tipo)->paginate(10);
            } else {

                $usuarios = usuario::select(
                    'id_usuario',
                    'nombre',
                    'ap_pat',
                    'ap_mat',
                    'telefono',
                    'email'
                )->paginate(10);
            }

            return response()->json([
                'data'      => $usuarios,
                'message'   => 'Se han obtenido los usuarios'
            ], 200);
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }

    //Función que regresa todos los tipos de usuario.
    public function getUserTypes()
    {
        $tipos = tipo_usuario::select('id_tipo', 'tipo')
            ->get();

        return response()->json([
            'data'      => $tipos,
            'message'   => 'Se han obtenido los tipos de usuario'
        ], 200);
    }

}
