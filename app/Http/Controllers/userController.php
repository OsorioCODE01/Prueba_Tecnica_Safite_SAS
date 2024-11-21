<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $usuarios = Users::all();

        if ($usuarios->isEmpty()) {
            $data = [
                'message' => 'No hay usuarios registrados',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        $data = [
            'users' => $usuarios,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $usuario = Users::find($id);
        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'user' => $usuario,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:usersf',
            'telefono' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        };

        $usuario = Users::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono
        ]);

        if (!$usuario) {
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Usuario creado correctamente',
            'status' => 201
        ];
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $usuario = Users::find($id);

            if (!$usuario) {
                return response()->json([
                    'message' => 'Usuario no encontrado',
                    'status' => 404
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nombre' => 'required|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'telefono' => 'required|max:10'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error en la validación de los datos',
                    'errors' => $validator->errors(),
                    'status' => 400
                ], 400);
            }

            $usuario->update($request->all());

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'status' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el usuario',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $usuario = Users::find($id);

            if (!$usuario) {
                return response()->json([
                    'message' => 'Usuario no encontrado',
                    'status' => 404
                ], 404);
            }

            $usuario->delete();

            return response()->json([
                'message' => 'Usuario eliminado correctamente',
                'status' => 200
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json([
                    'message' => 'No se puede eliminar el usuario porque tiene registros asociados.',
                    'status' => 409
                ], 409);
            }


            return response()->json([
                'message' => 'Ocurrió un error al intentar eliminar el usuario.',
                'error' => $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
