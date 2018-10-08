<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talle;

class TalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talles=talle::orderBy('id_talle')->paginate(25);        
        return view('talle.index', compact ('talles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('talle.create');   //
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

        talle::create($request->all());
        return redirect()->route('talle.index')->with('success','Registro creado satisfactoriamente');   


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $talles=talle::find($id);
        return  view('talle.show',compact('talles'));  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $talles=talle::find($id);
        return view('talle.edit',compact('talles'));
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
 

        talle::find($id)->update($request->all());
        return redirect()->route('talle.index')->with('success','Registro actualizado satisfactoriamente');
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
        talle::find($id)->delete();
        return redirect()->route('talle.index')->with('success','Registro eliminado satisfactoriamente');
         //
    }
}

