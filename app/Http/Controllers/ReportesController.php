<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class ReportesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mes)
    {
        $ano = explode('-', $mes ) ;
        $ano = $ano[0];
        $mesi_t = explode('-', $mes) ;
        $mesi = $mesi_t[1];

        $total   = DB::table('persons')->whereYear('created_at', '=', $ano)->whereMonth('created_at', '=', $mesi)->count();
        $total_f = DB::table('persons')->where('gender','f')->whereYear('created_at', '=', $ano)->whereMonth('created_at', '=', $mesi)->count();
        

        ///reportes x mes PARTOS
        $total_meses = array();
        for( $i= 1 ; $i <= 12 ; $i++ ){
            $total_meses[] = DB::table('persons')
              ->whereYear('created_at', '=', $ano)
              ->whereMonth('created_at', '=', $i)
            ->count();
        }

        ///reportes x mes NEO
        $total_f_array = array();
        for( $i= 1 ; $i <= 12 ; $i++ ){
            $total_f_array[] = DB::table('persons')
              ->whereYear('created_at', '=', $ano)
              ->whereMonth('created_at', '=', $i)
            ->count();
        }
  
        return view('reports.mensual')
          ->with('mes', $mes)
          ->with('total', $total)
          ->with('total_meses', $total_meses)
          ->with('total_f', $total_f)
          ->with('total_f_array', $total_f_array);

    }
}
