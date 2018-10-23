<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Data;
use View;
use App;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $data = new Data();

      return view('reporte.index', compact ('data')); //
    }

   /* public function __construct()
    {
        $this->middleware('guest');
    } */

    public function generar(Request $request)
    {

        $razon_social = $request->valor_rs;
        $precio_total = $request->valor_psp;

        $data = DB::table('ProductoPresupuesto')
        ->select('id_pp','nombre_actividad','nombre_producto','cantidad_pp','precio_unitario_pp','precio_total_pp')
        ->where('id_presupuesto','=',$request->valor_p)
        ->get();

        $view = View::make('reporte.index',compact('data','razon_social','precio_total'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

     //   return view('reporte.index', compact ('data'));

        return $pdf->stream('informe'.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }
}
