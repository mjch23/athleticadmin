<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Proveedor;
use App\CuentaBancaria;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=Proveedor::where('inactivo',NULL)
        ->orderBy('id_proveedor')
        ->paginate(25);        
        return view('proveedor.index', compact ('proveedores')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('proveedor.create');   //
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

        Proveedor::create($request->all());
        return redirect()->route('proveedor.index')->with('success','Registro creado satisfactoriamente');   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $cuentabancaria=CuentaBancaria::where('inactivo',NULL)
        ->where('id_proveedor',$id)
        ->orderBy('id_cuenta')
        ->paginate(25);    

        $proveedores=Proveedor::find($id);
        return  view('proveedor.show',compact('proveedores','cuentabancaria'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $proveedores=Proveedor::find($id);
        return view('proveedor.edit',compact('proveedores'));
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
 

        Proveedor::find($id)->update($request->all());
        return redirect()->route('proveedor.index')->with('success','Registro actualizado satisfactoriamente');
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
        $proveedor = Proveedor::find($id);
        $proveedor->inactivo = '1';
        $proveedor->save();
        return redirect()->route('proveedor.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}
