<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RoutesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $req)
    {
        $airports = Route::all();
        return $airports;
    }

    public function store(Request $req)
    {

        Log::info($req);
        $validator = Validator::make($req->all(), [
            'IDDepartured' => 'required',
            'IDArrieved' => 'required',
            'Name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'data invalid'], 400, []);
        }

        $data = $req->json()->all();

        try {
            $model = Route::create([
                'IDDepartured' => $data['IDDepartured'],
                'IDArrieved' => $data['IDArrieved'],
                'Name' => $data['Name'],
            ]);
        } catch (QueryException $e) {

            $errorCode = $e->errorInfo[1];
            return response()->json(['DB ERROR:' => $e], 500, []);
        }
        return response()->json($model, 201);
    }

    public function delete($id)
    {
        $data = Route::where('IDRoute', $id)->first();
        if ($data !== null) {
            $data->delete();
            return response()->json([], 200);
        } else {
            //record not found
            return response()->json([], 404);
        }

    }

    public function show($id)
    {
        $data = Route::where('IDRoute', $id)->get();

        if (count($data) > 0) {
            return response()->json($data, 200);
        } else {
            return response()->json([], 404);
        }
    }

    /**
     * update airport data
     * $id ->
     */
    public function update(Request $request, $id)
    {
        $model = null;
        try {
            $model = Route::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([], 404, []);
        }
        try {
            $result = $model->update($request->all());
            
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            return response()->json(['Database error' => $e], 400, []);
        }
        if ($result) {
            return response()->json($model, 200);
        } else {
            return response()->json(['error' => 'Error al actualizar'], 400, []);
        }
    }
}
