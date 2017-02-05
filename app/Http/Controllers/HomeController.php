<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ano = explode('-', date('Y', strtotime('+0 months')) );
      $ano = $ano[0];
      $total  = DB::table('persons')->whereYear('created_at', '=', $ano)->count();
      
      $total_meses = array();
      for( $i= 1 ; $i <= 12 ; $i++ ){
          $total_meses[] = DB::table('persons')
            ->whereYear('created_at', '=', $ano)
            ->whereMonth('created_at', '=', $i)
          ->count();
      }

      $total_meses_f = array();
      for( $i= 1 ; $i <= 12 ; $i++ ){
          $total_meses[] = DB::table('persons')
            ->where('gender','f')
            ->whereYear('created_at', '=', $ano)
            ->whereMonth('created_at', '=', $i)
          ->count();
      }
      return view('welcome',  compact('total_meses','total_meses_f'));
    }
}