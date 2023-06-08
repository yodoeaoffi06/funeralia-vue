<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\servicio;
use App\Models\trabajador;
use App\Models\asignacion;

class ServicesAssignmentController extends Controller
{
    //Función para realizar una asignación de servicios a un trabajador dado
    public function assignService(Request $request)
    {

        try {

            $rules = [
                'id_servicio'    => 'required|string',
                'id_trabajador'  => 'required|string',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                //$response['data'] = $validator->messages();
                return response()->json(array('message' => $validator->messages()), 400);
            }

            $asignacion = new asignacion();

            $asignacion->id_servicio    = $request->id_servicio;
            $asignacion->id_trabajador  = $request->id_trabajador;

            if($asignacion->save()) {

                return response()->json([
                    'message'   => 'Se ha creado la asignacion',
                    'data'      => $asignacion->id_asignacion
                ], 200);
            }

            return response()->json(['message' => 'No se ha creado la asignacion'], 400);
        } catch(Exception $e) {

            return response()->json(['error' => $e], 400);
        }
    }

    //función para eliminar o remover una asignacion dada
    public function removeAssignment($id_asignacion)
    {

        try {

            $asignacion = usuaasignacionrio::where('id_asignacion', $id_asignacion)
                ->first();

            if($asignacion) {

                $asignacion->delete();

                return response()->json(['message' => 'Se ha removido las asignacion'], 200);
            } else {

                return response()->json(['message' => 'No se encontró la asignación dada'], 400);
            }
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }

    //Función que actualiza una asignacion dado
    public function updateAssignment(Request $request, $id_asignacion)
    {

        try {
            $asignacion = usuario::where('id_asignacion', $id_asignacion)
                ->first();

            if($asignacion) {

                if($request->id_servicio) {

                    $asignacion->id_servicio = $request->id_servicio;
                }

                if($request->id_trabajador) {

                    $asignacion->id_trabajador = $request->id_trabajador;
                }

                $asignacion->save();

                return response()->json(['message' => 'Se ha actualizado la asignacion'], 200);
            } else {

                return response()->json(['message' => 'No se encontró la asignacion dada'], 400);
            }
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }

    //Función para obtener todas las asignaciones de trabajadores a servicios cuya fecha de entrega o de recogida sea "hoy"
    public function getTodayServices()
    {

        try {

            $hoy = Carbon::now()->toDateString();

            $servicios = servicio::join('cliente AS a', 'a.id_cliente', '=', 'servicio.id_cliente')
                ->join('tipo_servicio AS b', 'b.id_tipo_servicio', '=', 'servicio.id_tipo_servicio')
                ->join('asignacion AS c', 'c.id_servicio', '=', 'servicio.id_servicio')
                ->select(
                    'servicio.id_servicio',
                    'b.tipo AS tipo_servicio',
                    'a.nombre AS nombre_cliente',
                    'a.telefono AS telefono_cliente',
                    'a.direccion',
                    'fecha_entrega',
                    'fecha_recogida',
                    'c.id_asignacion'
                )->where(function ($query) use ($hoy) {
                    $query->where('fecha_entrega', $hoy)
                        ->orWhere('fecha_recogida', $hoy);
                })
                ->get();

            if($servicios->isEmpty()) {

                return response()->json([
                    'data'      => $servicios,
                    'message'   => 'Se han obtenido los servicios'
                ], 200);
            }

            return response()->json(['message' => 'No hay servicios para hoy'], 400);
        } catch(Exception $e) {

            return response()->json(['exeption' => $e], 400);
        }
    }
}
