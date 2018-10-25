<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\CuentaBancaria;
use App\Proveedor;

class CuentaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentabancaria=CuentaBancaria::where('inactivo',NULL)
        ->orderBy('id_cuenta')
        ->paginate(25);        
        return view('proveedor.show', compact ('cuentabancaria')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\m_responsekeys(conn, identifier)
     */
    public function create(Request $request)
    {

            $id_proveedor = $request->id_proveedor;

             return view('cuentabancaria.create', compact('id_proveedor'));   //
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



        $id_proveedor = $request->id_proveedor;

        $cuentabancaria=CuentaBancaria::where('inactivo',NULL)
        ->where('id_proveedor',$id_proveedor)
        ->orderBy('id_cuenta')
        ->paginate(25);      

        $proveedores=Proveedor::find($id_proveedor);

        CuentaBancaria::create($request->all());

        return redirect()->route('proveedor.show', compact('id_proveedor','proveedores','cuentabancaria'));
        //return view ('proveedor.show', compact('id_proveedor','proveedores','cuentabancaria'));   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cuentabancaria=CuentaBancaria::find($id);
        return  view('proveedor.show',compact('cuentabancaria'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cuentabancaria=CuentaBancaria::find($id);
        return view('cuentabancaria.edit',compact('cuentabancaria'));
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
 
        $id_proveedor = $request->id_proveedor;

        $cuentabancaria=CuentaBancaria::where('inactivo',NULL)
        ->where('id_proveedor',$id_proveedor)
        ->orderBy('id_cuenta')
        ->paginate(25);      

        $proveedores=Proveedor::find($id_proveedor);

        CuentaBancaria::find($id)->update($request->all());

        return redirect()->route('proveedor.show', compact('id_proveedor','proveedores','cuentabancaria'));
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
        $cuentabancaria = CuentaBancaria::find($id);
        $cuentabancaria->inactivo = '1';
        $cuentabancaria->save();
        return back();
        //return redirect()->route('cuentabancaria.store')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}
