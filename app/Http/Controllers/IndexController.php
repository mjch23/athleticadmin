<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Data;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function addItem(Request $request)
    {
        $rules = array(
                'nombre_actividad',            
                'nombre_producto' => 'required',
                'cantidad_pp',
                'precio_unitario_pp',
                'precio_total_pp',
                'id_presupuesto'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(

                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Data();
            $data->nombre_actividad = $request->nombre_actividad;
            $data->nombre_producto = $request->nombre_producto;
            $data->cantidad_pp = $request->cantidad_pp;
            $data->precio_unitario_pp = $request->precio_unitario_pp;
            $data->precio_total_pp = ($request->precio_unitario_pp)*($request->cantidad_pp); 
            $data->id_presupuesto = $request->id_presupuesto;           
            $data->save();

            return response()->json($data);
        }
    }
    public function readItems(Request $req)
    {
        $data = Data::all();

        return view('welcome')->withData($data);
    }
    public function editItem(Request $req)
    {
        $data = Data::find($req->id_pp);
        $data->nombre_producto = $req->nombre_producto;
        $data->save();

        return response()->json($data);
    }
    public function deleteItem(Request $req)
    {
        Data::find($req->id_pp)->delete();

        return response()->json();
    }
}
