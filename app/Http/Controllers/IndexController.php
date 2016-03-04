<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getInicio()
    {	
    	 $meses=array(
            ''=>'Seleccionar..',
            '01'=>'Enero',
            '02'=>'Febrero',
            '03'=>'Marzo',
            '04'=>'Abril',
            '05'=>'Mayo',
            '06'=>'Junio',
            '07'=>'Julio',
            '08'=>'Agosto',
            '09'=>'Septiembre',
            '10'=>'Octubre',
            '11'=>'Nobiembre',
            '12'=>'Diciembre',
        );
    	 $opciones=array(
            ''=>'Seleccionar..',
            'csv'=>'Excel',
            'pantalla'=>'pantalla',
        );

        return response()->view('welcome',array(
            'meses'=>$meses,
            'opciones'=>$opciones,
            ));
    }

}