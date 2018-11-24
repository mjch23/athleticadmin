<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presupuesto;
use App\Orden;
use App\Data;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{

    public function index()
    {

   /*  $ordenes=Orden::orderBy('id_orden','desc')
     ->where('orden.inactivo',NULL)
      ->paginate(100); */


        $ordenes=DB::table('orden')
            ->leftjoin('presupuesto', 'orden.id_presupuesto', '=', 'presupuesto.id_presupuesto')
            ->leftjoin('clientes','presupuesto.id_cliente','=','clientes.id')
            ->join('estado','orden.id_estado','=','estado.id_estado')
            ->select('*')
            ->where('orden.inactivo',NULL)
            ->orderBy('orden.id_orden','DESC')
            ->get(); 

        return view('orden.index', compact ('ordenes')); 
    }


    public function create(Request $request)
    {
        

        $estado=DB::table('estado')
        ->where('id_estado',1)
        ->first();
    
        $id_presupuesto = $request->id_presupuesto;

        DB::table('presupuesto')
        ->where('id_presupuesto',$id_presupuesto)
        ->update(['aprobada_presupuesto'=>1]);

        $presupuesto=DB::table('presupuesto')
        ->select('*')
        ->where('id_presupuesto',$id_presupuesto)
        ->first();


        $fecha= date("Y-m-d H:i:s");

        $orden = new Orden();
        $orden->id_presupuesto = $id_presupuesto;
        $orden->fecha_inicio_orden = $fecha;
        $orden->id_estado = $estado->id_estado;
        $orden->precio_orden = $presupuesto->precio_presupuesto;
        $orden->save();

        //obtiene el id de la última orden cargada

        $id_orden = DB::table('orden')
        ->select('id_orden')
        ->latest()
        ->first();

       
        $id_orden_new = $id_orden->id_orden;

        DB::table('presupuesto')
        ->where('id_presupuesto',$id_presupuesto)
        ->update(['id_orden'=>$id_orden_new]);

        return view('orden.success',compact('id_orden'));
    
        //return redirect()->route('orden.show',compact('id_presupuesto'));


    }


    public function store(Request $request)
    {
   



    }


    public function show($id)
    {


             $presupuestos=DB::table('presupuesto')
             ->where('id_orden',$id)
             ->first();


            $data = Data::all();

            $orden = DB::table('orden')
            ->select('*')
            ->where('id_presupuesto',$presupuestos->id_presupuesto)
            ->first();

            $estado = DB::table('estado')
            ->join('orden','estado.id_estado','=','orden.id_estado')
            ->select('descripcion_estado')
            ->where('id_orden',$id)
            ->first();


            $cliente = DB::table('clientes')
            ->select('razon_social')
            ->where('id','=',$presupuestos->id_cliente)
            ->get();


            $actividades = DB::table('actividad')      
            ->select('*')
            ->orderBy('id_actividad')
            ->get(); 

            $precio_presupuesto = $presupuestos->precio_presupuesto;
     

            return view('orden.show',compact('orden','presupuestos','actividades','data','cliente','estado','precio_presupuesto'));


    }


    public function edit($id)
    {
     

    }


    public function update(Request $request, $id)
    {


        $fecha_prom_orden = $request->datepicker;

        $newDate = date("Y-m-d H:i:s", strtotime($fecha_prom_orden));

        DB::table('orden')
        ->where('id_orden',$id)
        ->update(['fecha_prom_orden'=>$newDate]);

   
        $estado=DB::table('orden')
        ->select('id_estado')
        ->where('id_orden',$id)
        ->first();

        $nuevo_estado=$estado->id_estado+1;

        DB::table('orden')
        ->where('id_orden',$id)
        ->update(['id_estado'=>$nuevo_estado]);

        if($nuevo_estado==3){

        DB::table('orden')
        ->where('id_orden',$id)
        ->update(['fecha_cierre_orden'=>date("Y-m-d H:i:s")]);

        }

        return redirect()->route('orden.index'); 

       


    }

    public function archive($id)
    {

        $orden=Orden::find($id);
        $orden->inactivo='1';
        $orden->save();
        return view('orden.show');     //
    }


    public function destroy($id)
    {

        $orden=Orden::find($id);
        $orden->inactivo='1';
        $orden->save();
        return back();     //
    }
}

