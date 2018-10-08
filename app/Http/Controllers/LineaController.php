<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Linea;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lineas=linea::orderBy('id_linea')->paginate(25);        
        return view('linea.index', compact ('lineas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('linea.create');   //
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

        linea::create($request->all());
        return redirect()->route('linea.index')->with('success','Registro creado satisfactoriamente');   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lineas=linea::find($id);
        return  view('linea.show',compact('lineas'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $lineas=linea::find($id);
        return view('linea.edit',compact('lineas'));
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
 

        Linea::find($id)->update($request->all());
        return redirect()->route('linea.index')->with('success','Registro actualizado satisfactoriamente');
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
        linea::find($id)->delete();
        return redirect()->route('linea.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}

