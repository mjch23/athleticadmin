<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presupuesto;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Data;
use App\Actividad;
use App\Http\Controller\ReportController;


class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //$presupuestos=Presupuesto::orderBy('id_presupuesto')->paginate(25);  

         $presupuestos = DB::table('presupuesto')
            ->join('clientes', 'presupuesto.id_cliente', '=', 'clientes.id')
            ->select('*')
            ->where('presupuesto.inactivo',NULL)
            ->orderBy('id_presupuesto','DESC')
            ->get();


        return view('presupuesto.index', compact ('presupuestos')); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            $data = Data::all();

            $clientes = DB::table('clientes')
            ->select('*')
            ->where('inactivo',NULL)
            ->orderBy('id')
            ->get();

            $actividades = DB::table('actividad')      
            ->select('*')
            ->orderBy('id_actividad')
            ->get(); 


             return view('presupuesto.create', compact ('actividades','data','clientes'));   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //   $this->validate($request,[ 'club'=>'required', 'actividad'=>'required', 'localidad'=>'required', 'apellido'=>'required', 'nombres'=>'required']);

        $razon_social = $request->razon_social;

        $id_cliente = DB::table('clientes')
        ->select('id')
        ->where('razon_social','=',$razon_social)
        ->first()
        ->id;

       $fecha= date("Y-m-d H:i:s"); // https://donnierock.com/2012/06/26/convertirfechasphp/


        $presupuesto = new Presupuesto();
        $presupuesto->id_cliente = $id_cliente;
        $presupuesto->anulada_presupuesto = 0;
        $presupuesto->fecha_presupuesto = $fecha;
        $presupuesto->aprobada_presupuesto = 0;
        $presupuesto->precio_presupuesto = 0;
        $presupuesto->save();


        //Presupuesto::create($request->all());
        return redirect()->route('presupuesto.index')->with('success','Registro creado satisfactoriamente');   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuestos=Presupuesto::find($id);
        return  view('presupuesto.show',compact('presupuestos'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $presupuestos=presupuesto::find($id);

            $data = Data::all();

            $cliente = DB::table('clientes')
            ->select('razon_social')
            ->where('id','=',$presupuestos->id_cliente)
            ->get();


            $actividades = DB::table('actividad')      
            ->select('*')
            ->orderBy('id_actividad')
            ->get(); 

            $precio_presupuesto = DB::table('ProductoPresupuesto')
            ->where('id_presupuesto','=',$id)
            ->sum('precio_total_pp');

     
        return view('presupuesto.edit',compact('presupuestos','actividades','data','cliente','precio_presupuesto'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $this->validate($request,[ 'nombre'=>'required', 'resumen'=>'required', 'npagina'=>'required', 'edicion'=>'required', 'autor'=>'required', 'npagina'=>'required', 'precio'=>'required']);
 

        DB::table('presupuesto')
        ->where('id_presupuesto',$id)
        ->update(['precio_presupuesto'=>$request->precio_presupuesto]);


        return redirect()->route('presupuesto.index')->with('success','Registro actualizado satisfactoriamente');
  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presupuesto = Presupuesto::find($id);
        $presupuesto->inactivo = '1';
        $presupuesto->save();
        return back();
        //return redirect()->route('presupuesto.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }

    /*public function pdf()
    {        
  
        // https://rimorsoft.com/generar-reportes-pdf-en-laravel-5-5

        $actividades = Actividad::all(); 

        $pdf = PDF::loadView('actividad.index', compact('actividades'));

        return $pdf->download('listado.pdf');
    } */

}

