<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\servicio;
use App\Models\cliente;
use App\Models\mobiliario;
use App\Models\mobiliario_total;

class ServicesController extends Controller
{
    
    //Función para genera un nuevo cliente
    public function createClient(Request $request)
    {

        try {

            $rules = [
                'nombre'    => 'required|string',
                'telefono'  => 'required|string',
                'direccion' => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                //$response['data'] = $validator->messages();
                return response()->json(array('message' => $validator->messages()), 400);
            }

            $cliente = new cliente();

            $cliente->nombre = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;

            if($cliente->save()) {

                return response()->json([
                    'message'   => 'Se ha creado el cliente',
                    'data'      => $cliente->id_cliente
                ], 200);
            }

            return response()->json(['message' => 'No se ha creado el cliente'], 400);
        } catch(Exception $e) {

            return response()->json(['error' => $e], 400);
        }
    }

    //Funciónn que genera un nuevo servici
    public function createService(Request $request)
    {

        try {

            $rules = [
                'id_cliente'            => 'required|int',
                'id_tipo_servicio'      => 'required|int',
                'fecha_entrega'         => 'required|string',
                'fecha_recogida'        => 'required|string',

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                //$response['data'] = $validator->messages();
                return response()->json(array('message' => $validator->messages()), 400);
            }

            $servicio = new servicio();

            $servicio->id_cliente       = $request->id_cliente;
            $servicio->id_tipo_servicio    = $request->id_tipo_servicio;
            $servicio->fecha_entrega    = $request->fecha_entrega;
            $servicio->fecha_recogida   = $request->fecha_recogida;

            if($servicio->save()) {

                return response()->json([
                    'message'   => 'Se ha creado el servicio',
                    'data'      => $servicio->id_servicio
                ], 200);
            }

            return response()->json(['message' => 'No se ha creado el servicio'], 400);
        } catch(Exception $e) {

            return response()->json(['error' => $e], 400);
        }
    }

    //Función para generar mobiliario
    public function generateMobilary(Request $request)
    {

        try {

            $rules = [
                'id_servicio'   => 'required|int',
                'id_mobiliario' => 'required|int',
                'cantidad'      => 'required|int'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                //$response['data'] = $validator->messages();
                return response()->json(array('message' => $validator->messages()), 400);
            }

            $mobiliario = new mobiliario_total();

            $mobiliario->id_servicio    = $request->id_servicio;
            $mobiliario->id_mobiliario  = $request->id_mobiliario;
            $mobiliario->cantidad       = $request->cantidad;

            if($mobiliario->save()) {

                return response()->json([
                    'message'   => 'Se ha generado mobiliario al servicio',
                    'data'      => $mobiliario->id_mobiliario_total
                ], 200);
            }

            return response()->json(['message' => 'No se ha generado mobiliario al servicio'], 400);
        } catch(Exception $e) {

            return response()->json(['error' => $e], 400);
        }
    }

    //Función que retorna todos los servicios
    public function getServices()
    {

        try {

            $servicios = servicio::select(
                'id_servicio',
                'a.tipo',
                'b.nombre AS nombre_cliente',
                'b.telefono AS telefono_cliente',
                'b.direccion',
                'fecha_entrega',
                'fecha_recogida'
            )->join('tipo_servicio AS a', 'servicio.id_tipo_Servicio', '=', 'a.id_tipo_servicio')
            ->join('cliente AS b', 'servicio.id_cliente', '=', 'b.id_cliente')
            ->get();

            $servicios->each(function ($item) {
                // Lógica personalizada para agregar el valor adicional
                $item->mobiliario_total = mobiliario_total::select(
                    'a.nombre AS mobiliario',
                    'cantidad'
                )->join('mobiliario AS a', 'mobiliario_total.id_mobiliario', '=', 'a.id_mobiliario')
                ->where('id_servicio', $item->id_servicio)
                ->get();
            });

            if($servicios) {

                return response()->json([
                    'message'       => 'Se han obtenido los servicios',
                    'data'  => $servicios
                ], 200);
            }

            return response()->json(['message' => 'No hay servicios'], 400);
        } catch(Exception $e) {

            return response()->json(['error' => $e], 400);
        }
    }

    //Función para obtener la información de un servicio.
    public function getServiceInformation($id_servicio)
    {

        try {

            $servicio = servicio::select(
                'id_servicio',
                'a.tipo',
                'b.nombre AS nombre_cliente',
                'b.telefono AS telefono_cliente',
                'b.direccion',
                'fecha_entrega',
                'fecha_recogida'
            )->join('tipo_servicio AS a', 'servicio.id_tipo_Servicio', '=', 'a.id_tipo_servicio')
            ->join('cliente AS b', 'servicio.id_cliente', '=', 'b.id_cliente')
            ->where('id_servicio', $id_servicio)
            ->first();

            if($servicio) {

                $servicio->mobiliario_total = mobiliario_total::select(
                    'a.nombre AS mobiliario',
                    'cantidad'
                )->join('mobiliario AS a', 'mobiliario_total.id_mobiliario', '=', 'a.id_mobiliario')
                ->where('id_servicio', $id_servicio)
                ->get();

                if($servicio->mobiliario_total) {

                    return response()->json([
                        'message'       => 'Se ha obtenido el servicio',
                        'data'  => $servicio
                    ], 200);
                }

                return response()->json(['message' => 'No hay mobiliario asignado'], 400);
            }

            return response()->json(['message' => 'Servicio no encontrado'], 400);
        } catch(Exeption $e) {

        }
    }
}
