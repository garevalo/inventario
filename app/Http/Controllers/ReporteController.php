<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReporteController extends Controller
{

    public function ActivosObsoletos(){
       return view('reportes.frmactivosobsoletos');
    }

    public function ActivosObsoletosPdf(Request $request)
    {
        $pdf = PDF::loadView('reportes.activospdf');
        //return $pdf->download('pruebapdf.pdf');
        return $pdf->stream();
    }

    public function LicenciasPagadas()
    {
        return view('reportes.frmlicencias');

    }

    public function LicenciasPagadasPdf()
    {
        $pdf = PDF::loadView('reportes.licenciapagadas');
        return $pdf->stream();
    }

}
