<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Actividad;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    public function index()
    {


        $productos=Producto::orderBy('id_producto')->paginate(100);   

        return view('producto.index', compact ('productos')); 
    }


    public function create()
    {
            
            $actividades = DB::table('actividad')      
            ->select('*')
            ->orderBy('id_actividad')
            ->get(); 

             return view('producto.create', compact('actividades'));   //
    }


    public function store(Request $request)
    {
      //   $this->validate($request,[ 'club'=>'required', 'actividad'=>'required', 'localidad'=>'required', 'apellido'=>'required', 'nombres'=>'required']);


        Producto::create($request->all());
        return redirect()->route('producto.index')->with('success','Registro creado satisfactoriamente');   


    }


    public function show($id)
    {
        $productos=producto::find($id);
        return  view('producto.show',compact('productos'));  //
    }


    public function edit($id)
    {
     
            $actividades = DB::table('actividad')      
            ->select('*')
            ->orderBy('id_actividad')
            ->get(); 

        $productos=producto::find($id);
        return view('producto.edit',compact('productos','actividades'));
        //
    }


    public function update(Request $request, $id)
    {
       // $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);
 

        producto::find($id)->update($request->all());
        return redirect()->route('producto.index')->with('success','Registro actualizado satisfactoriamente');
  //
    }


    public function destroy($id)
    {
        producto::find($id)->delete();
        return redirect()->route('producto.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}

