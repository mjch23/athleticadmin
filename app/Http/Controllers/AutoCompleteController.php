<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoCompleteController extends Controller
{

    function index()
    {
     return view('presupuesto.create');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('clientes')
        ->where('razon_social', 'LIKE', "%{$query}%")
        ->get();

      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->id.' - '.$row->razon_social.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



}