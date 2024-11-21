<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Validator;

class ventasController extends Controller
{
    public function index()
    {
        $ventas = Ventas::all();

        if ($ventas->isEmpty()) {
            $data = [
                'message' => 'No hay ventas registradas',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        $data = [
            'ventas' => $ventas,
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_vendedor' => 'required|numeric',
            'referencia_factura' => 'required|max:255|unique:ventas',
            'valor' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        };

        $venta = Ventas::create([
            'id_vendedor' => $request->id_vendedor,
            'referencia_factura' => $request->referencia_factura,
            'valor' => $request->valor
        ]);

        if (!$venta) {
            $data = [
                'message' => 'Error al registrar la venta',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Venta registrada correctamente',
            'status' => 201
        ];

        return response()->json($data, 201);
    }
}
