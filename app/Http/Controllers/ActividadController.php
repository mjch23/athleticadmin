<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades=Actividad::orderBy('id_actividad')->paginate(25);        
        return view('actividad.index', compact ('actividades'));   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('actividad.create');         //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Actividad::create($request->all());
        return redirect()->route('actividad.index')->with('success','Registro creado satisfactoriamente');     //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividades=Actividad::find($id);
        return  view('actividad.show',compact('actividades'));          //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividades=Actividad::find($id);
        return view('actividad.edit',compact('actividades'));        //
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
 

        Actividad::find($id)->update($request->all());
        return redirect()->route('actividad.index')->with('success','Registro actualizado satisfactoriamente');        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        Actividad::find($id)->delete();
        return redirect()->route('actividad.index')->with('success','Registro eliminado satisfactoriamente');      //
    }
}
