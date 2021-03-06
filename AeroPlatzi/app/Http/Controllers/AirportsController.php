<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AirportsController extends Controller
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
        $airports = Airport::all();
        return $airports;
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'IataCode' => 'required',
            'Airportname' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'data invalid'], 400, []);
        }
        $data = $req->json()->all();
        try {
            $model = Airport::create([
                'IataCode' => $data['IataCode'],
                'Airportname' => $data['Airportname'],
            ]);
        } catch (QueryException $e) {

            $errorCode = $e->errorInfo[1];
            return response()->json(['DB ERROR:' => $e], 500, []);
        }
        return response()->json($model, 201);
    }

    public function delete($id)
    {
        $data = Airport::where('IDAirport', $id)->first();
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
        $data = Airport::where('IDAirport', $id)->get();

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
            $model = Airport::findOrFail($id);
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
