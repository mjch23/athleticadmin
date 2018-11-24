<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::where('inactivo',NULL)
        ->orderBy('id')
        ->paginate(25);        
        return view('clientes.index', compact ('clientes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('clientes.create');   //
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

        Cliente::create($request->all());
        return redirect()->route('cliente.index')->with('success','Registro creado satisfactoriamente');   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


            $presupuestos = DB::table('presupuesto')
            ->join('clientes', 'presupuesto.id_cliente', '=', 'clientes.id')
            ->select('*')
            ->where('presupuesto.inactivo',NULL)
            ->where('presupuesto.id_cliente',$id)
            ->orderBy('id_presupuesto','DESC')
            ->get();

            $ordenes=DB::table('orden')
            ->leftjoin('presupuesto', 'orden.id_presupuesto', '=', 'presupuesto.id_presupuesto')
            ->leftjoin('clientes','presupuesto.id_cliente','=','clientes.id')
            ->join('estado','orden.id_estado','=','estado.id_estado')
            ->select('*')
            ->where('orden.inactivo',NULL)
             ->where('clientes.id',$id)           
            ->orderBy('orden.id_orden','DESC')
            ->get(); 


        $clientes=Cliente::find($id);
        return  view('clientes.show',compact('clientes','presupuestos','ordenes'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $clientes=Cliente::find($id);
        return view('clientes.edit',compact('clientes'));
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
 

        Cliente::find($id)->update($request->all());
        return redirect()->route('cliente.index')->with('success','Registro actualizado satisfactoriamente');
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
        $cliente=Cliente::find($id);
        $cliente->inactivo='1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}
