<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\ServiceProvider as PDF;

use App\Models\Notas;
use App\Models\Resultados;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class ControllerPDF extends Controller
{
    //
    public function downloadPDFAlumno(){
        // return 'Hola';
        $idAlumno = auth()->user()->id;
        $listaCal = Notas::all()->where('idAlumno', $idAlumno);
        $calFinal = Resultados::all()->where( 'idAlumno', $idAlumno);
        $pdf = App::make("dompdf.wrapper");
        $pdf -> loadView("sessions.imprimirCalAlumno", compact('listaCal', 'calFinal'));
        return $pdf->stream('calificaciones.pdf');
    }

    public function downloadPDFDocente(){
        // return 'Hola';
        $listaCal = Notas::all();
        $calFinal = Resultados::all();
        $pdf = App::make("dompdf.wrapper");
        $pdf -> loadView("sessions.imprimirCalDocente", compact('listaCal', 'calFinal'));
        return $pdf->stream('Reporte de Calificaciones.pdf');
    }
}
