<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Data;
use View;
use App;
use DateTime;

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

        if($request->origen!="orden") {

        $razon_social = $request->valor_rs;
        $precio_total = $request->valor_psp;
        $id_presupuesto = $request->valor_p;

        $data = DB::table('ProductoPresupuesto')
        ->select('id_pp','nombre_actividad','nombre_producto','cantidad_pp','precio_unitario_pp','precio_total_pp')
        ->where('id_presupuesto','=',$request->valor_p)
        ->get();

        $fecha_p = DB::table('presupuesto')
        ->select('fecha_presupuesto')
        ->where('id_presupuesto','=',$request->valor_p)
        ->first();

        list($yy,$mm,$dd)=explode("-",$fecha_p->fecha_presupuesto);
      //  $fecha_presupuesto = new DateTime();
      //  $fecha_presupuesto->setDate($yy, $mm, $dd);

      //  dd($yy);

        $cliente = DB::table('clientes')
        ->select('*')
        ->where('razon_social','=',$razon_social)
        ->get();

        $view = View::make('reporte.index',compact('data','razon_social','precio_total','id_presupuesto','cliente','yy','mm','dd'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

      // return view('reporte.index', compact ('data','razon_social','precio_total','id_presupuesto','cliente','yy','mm','dd'));

        return $pdf->stream('informe'.'.pdf');


        } else {

        $razon_social = $request->valor_rs;
        $precio_total = $request->valor_psp;
        $id_presupuesto = $request->valor_p;

        $data = DB::table('ProductoPresupuesto')
        ->select('id_pp','nombre_actividad','nombre_producto','cantidad_pp','precio_unitario_pp','precio_total_pp')
        ->where('id_presupuesto','=',$request->valor_p)
        ->get();

        $fecha_p = DB::table('orden')
        ->select('fecha_inicio_orden')
        ->where('id_presupuesto','=',$request->valor_p)
        ->first();

        list($yy,$mm,$dd)=explode("-",$fecha_p->fecha_inicio_orden);
      //  $fecha_presupuesto = new DateTime();
      //  $fecha_presupuesto->setDate($yy, $mm, $dd);

      //  dd($yy);

        $orden=DB::table('orden')
        ->select('*')
        ->where('id_presupuesto','=',$request->valor_p)
        ->first();

        $cliente = DB::table('clientes')
        ->select('*')
        ->where('razon_social','=',$razon_social)
        ->get();

        $view = View::make('reporte.orden',compact('data','razon_social','precio_total','id_presupuesto','orden','cliente','yy','mm','dd'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

      // return view('reporte.index', compact ('data','razon_social','precio_total','id_presupuesto','cliente','yy','mm','dd'));

        return $pdf->stream('informeorden'.'.pdf');



        }
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
