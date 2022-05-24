<?php

namespace App\Http\Controllers;

use App\Models\Examenes;
use App\Models\Notas;
use App\Models\Preguntas;
use App\Models\Resultados;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function create(){
        return view('sessions.homealumno');
    }

    public function examen(){
        $listaExamenes = Examenes::all();
        return view('sessions.examenalumno', compact('listaExamenes'));
    }

    public function listarPreguntasResponder($idExamen){
        $examen = Examenes::all()->where('id', $idExamen);
        $preguntas = Preguntas::inRandomOrder()->where('idExamen',$idExamen)->limit(5)->get();
        $sizeExamen = sizeof($preguntas);
        return view('sessions.preguntasAlumno', compact('examen','preguntas', 'sizeExamen'));
    }

    public function calificacionExamen(Request $request){
        //Variables a mandar
        // Contadores
        $respuestasCorrectas = 0;
        $cal = 0;
        // pregunta1
        if($request->correcta1 == $request->resp1.$request->resp2.$request->resp3){
                $respuestasCorrectas++;
                $cal = $cal + 20;
        }

        // pregunta2
        if($request->correcta2 == $request->resp4.$request->resp5.$request->resp6){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        // pregunta3
        if($request->correcta3 == $request->resp7.$request->resp8.$request->resp9){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        // pregunta4
        if($request->correcta4 == $request->resp10.$request->resp11.$request->resp12){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }
        // pregunta5
        if($request->correcta5 == $request->resp13.$request->resp14.$request->resp15){
            $respuestasCorrectas++;
            $cal = $cal + 20;
        }

        //Recuperando valores
        $idAlumno = auth()->user()->id;
        $nombreAlumno = auth()->user()->name;
        $idExamen = $request->idExamen;

        //En la tabla resultados si el id del examen existe y el id del alumno existe, haz lo siguiente
        if(Resultados::where('idExamen',$idExamen)->where('idAlumno', $idAlumno)->exists()){
            //Asignamos el rgistro que se ecuentre en la posicion
            $intentoResultado = Resultados::where('idExamen',$idExamen)->where('idAlumno', $idAlumno)->get();

            foreach($intentoResultado as $intento){
                $numIntentos = $intento->intentos;
                $idResultado = $intento->id;
            }
            $numIntentos = $numIntentos+1; 

            //Notas
            $notas = new Notas();
            $notas -> idResultado = $idResultado;
            $notas -> idAlumno = $idAlumno;
            $notas -> alumno = $nombreAlumno;
            $notas -> idDocente = $request->idUsuario;
            $notas -> docente = $request->nombreUsuario;
            $notas -> tituloExamen = $request -> titulo;
            $notas -> calificacion = $cal;
            $notas -> numIntento = $numIntentos;
            $notas -> save();

            //Sacamos promedio
            $seleccionaProm = Notas::where('idResultado', $idResultado)->get();
            $nota = 0;
            $cantidadNotas = 0;
            foreach ($seleccionaProm as $prom) {
                $cantidadNotas++;
                $nota = $nota + $prom->calificacion;
            }

            $promedio = $nota / $cantidadNotas;

            $resultados = Resultados::find($idResultado);
            $resultados->idAlumno = $idAlumno;
            $resultados->alumno = $nombreAlumno;
            $resultados->idDocente = $request->idUsuario;
            $resultados->docente = $request->nombreUsuario;
            $resultados->idExamen = $idExamen;
            $resultados->tituloExamen = $request -> titulo;
            $resultados->intentos = $numIntentos;
            $resultados->promedio = $promedio;
            $resultados->save();
        }else{
            $resultados = new Resultados();
            $resultados->idAlumno = $idAlumno;
            $resultados->alumno = $nombreAlumno;
            $resultados->idDocente = $request->idUsuario;
            $resultados->docente = $request->nombreUsuario;
            $resultados->idExamen = $idExamen;
            $resultados->tituloExamen =  $request -> titulo;
            $resultados->intentos = 1;
            $resultados->promedio = $cal;
            $resultados->save();

            $idResultado = $resultados->id;
            //Notas
            $notas = new Notas();
            $notas -> idResultado = $idResultado;
            $notas -> idAlumno = $idAlumno;
            $notas -> alumno = $nombreAlumno;
            $notas -> idDocente = $request->idUsuario;
            $notas -> docente = $request->nombreUsuario;
            $notas -> tituloExamen = $request -> titulo;
            $notas -> calificacion = $cal;
            $notas -> numIntento = 1;
            $notas -> save();
        }

        return view('sessions.calificacionexamen', compact('cal'));

    }

    public function resultados(){
        $idAlumno = auth()->user()->id;
        $listaCal = Notas::all()->where('idAlumno', $idAlumno);
        $calFinal = Resultados::all()->where( 'idAlumno', $idAlumno);
        $sizeRes = sizeof($calFinal);
        return view('sessions.resultadosalumno', compact('listaCal', 'calFinal','sizeRes'));
    }
}
