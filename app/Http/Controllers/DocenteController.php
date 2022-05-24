<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Examenes;
use App\Models\Notas;
use App\Models\Preguntas;
use App\Models\Resultados;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function create(){
        return view('sessions.homedocente');
    }

    public function examen(){
        $idUsuario = auth()->user()->id;
        $listaExamenes = Examenes::all()->where('idUsuario', $idUsuario);
        return view('sessions.examendocente', compact('listaExamenes'));
    }
    
    public function storeExamen(){
        return view('sessions.agregartitulo');
    }

    //recibir lo de un formulario deifnimos obj request
    public function storeCrearExamen(Request $request){
        $request->validate([
            // 'titulo'=>'required|unique:examenes,titulo'
            'titulo'=>'required',
        ]);

        function del_acentos($cadena){
            $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿÑñ';
            $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
            $cadena = utf8_decode($cadena);
            $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
            return utf8_encode($cadena);
        }

        if(Examenes::where(del_acentos(Str::upper('titulo')),del_acentos(Str::upper($request->titulo)))->where('idUsuario',auth()->user()->id)->exists()){
            return back()->withErrors([
                'error_mes'=> 'No es posible agregar el examen. Ya existe!!!',
               ]);
        }

        $examen = new Examenes();
        $examen -> titulo = $request->titulo;
        $examen -> idUsuario = $request->idUsuario;
        $examen -> nombreUsuario = $request->nombreUsuario;
        $examen->save();
        // $idExamenn = Examenes::all();
        // return $idExamenn -> idExamen;
        $id = $examen -> id;
        //Rescatamos la variable
        return view('sessions.agregarexamen', compact('id'));
    }

    public function storePreguntas(){
        return view('sessions.agregarexamen');
    }

    public function storeCrearPreguntas(Request $request){
        // $request->validate([
        //     'pregunta'=>'required|max:10',
        //     'opcion1'=>'required|max:10',
        //     'opcion2'=>'required|max:10',
        //     'opcion3'=>'required|max:10'
        // ]);


        $preguntas = new Preguntas();
        $preguntas -> pregunta = $request -> pregunta;
        $preguntas -> opcion1 = $request -> opcion1;
        $preguntas -> opcion2 = $request -> opcion2;
        $preguntas -> opcion3 = $request -> opcion3;
        // $preguntas -> correcta = $request -> correcta;
        $respcorrecta = "";

        if($request -> correcta1=="1"){
            $respcorrecta = $respcorrecta.$request -> opcion1;
        }

        if($request -> correcta2=="2"){
            $respcorrecta = $respcorrecta.$request -> opcion2;
        }

        if($request -> correcta3=="3"){
            $respcorrecta = $respcorrecta.$request -> opcion3;
        }

        $preguntas -> correcta = $respcorrecta;

        $preguntas -> idExamen = $request -> idExamen;

        $preguntas -> save();
        $id = $preguntas -> idExamen;

        return view('sessions.agregarexamen', compact('id'));
    }

    // Eliminar examen
    public function destroy($id){
        $examenes = Examenes::find($id);
        $examenes-> delete();
        // return view('sessions.examendocente');
        $idUsuario = auth()->user()->id;
        $listaExamenes = Examenes::all()->where('idUsuario', $idUsuario);
        return view('sessions.examendocente', compact('listaExamenes'));
    }

    //EditarExamen-----------------
    public function editarExamen($idExamen){
        //Recuperamos las preguntas y los datos del examen
        $examen = Examenes::all()->where('id', $idExamen);
        $preguntas = Preguntas::all()->where('idExamen',$idExamen);
        return view('sessions.editarexamen', compact('examen','preguntas'));
    }

    //Eliminar pregunta----------------
    public function destroyPregunta($idPregunta){
        //recibimos id pregunta y se busca
        $preguntas = Preguntas::find($idPregunta);
        
        //  Recuperamos id de los examenes
        $idExa = $preguntas -> idExamen;
        $preguntasSize = Preguntas::all()->where('idExamen',$idExa);
        $sizePreg = sizeof($preguntasSize);
        if($sizePreg > 5 ){
            $preguntas -> delete();
            $examen = Examenes::all()->where('id', $idExa);
            $preguntas = Preguntas::all()->where('idExamen',$idExa);
            return view('sessions.editarexamen', compact('examen','preguntas'));
        }else{
            $examen = Examenes::all()->where('id', $idExa);
            $preguntas = Preguntas::all()->where('idExamen',$idExa);
            // return view('sessions.editarexamen', compact('examen','preguntas'));
            return redirect()->route('homedocente.examen', ['examen'=>$examen, 'preguntas'=>$preguntas])->with('delete','eliminado');
        }

        
    }

    //Agregar pregunta --------------------------
    public function addPregunta($idExamen){
        $examen = Examenes::all()->where('id', $idExamen);
        return view('sessions.agregarPregunta', compact('idExamen','examen'));
    }

    //Guardar pregunta
    public function savePregunta(Request $request){
        $request->validate([
            'pregunta'=>'required',
            'opcion1'=>'required',
            'opcion2'=>'required',
            'opcion3'=>'required'
        ]);

        $optrue = '';
        $preguntas = new Preguntas();
        $preguntas -> pregunta = $request -> pregunta;
        $preguntas -> opcion1 = $request -> opcion1;
        $preguntas -> opcion2 = $request -> opcion2;
        $preguntas -> opcion3 = $request -> opcion3;
        // $preguntas -> correcta = $request -> correcta;
        if($request->correcta == 'opcion1'){
            $optrue = $request -> opcion1;
        }

        if($request->correcta == 'opcion2'){
            $optrue = $request -> opcion2;
        }

        if($request->correcta == 'opcion3'){
            $optrue = $request -> opcion3;
        }

        $preguntas -> correcta = $optrue;

        $preguntas -> idExamen = $request -> idExamen;

        $preguntas -> save();

        $idExamen = $preguntas -> idExamen;
        $examen = Examenes::all()->where('id', $idExamen);
        return view('sessions.agregarPregunta', compact('idExamen','examen'));
    }

    //Editar pregunta -formulario
    public function editarPregunta($idExamen){
        $pregunta = Preguntas::all()->where('id', $idExamen);
        return view('sessions.editarpregunta', compact('pregunta'));
    }

    //Editar
    public function saveEditarPregunta(Request $request, Preguntas $collPregunta){
        $request->validate([
            'pregunta'=>'required',
            'opcion1'=>'required',
            'opcion2'=>'required',
            'opcion3'=>'required'
        ]);

        $optrue = '';

        $collPregunta -> pregunta = $request -> pregunta;
        $collPregunta -> opcion1 = $request -> opcion1;
        $collPregunta -> opcion2 = $request -> opcion2;
        $collPregunta -> opcion3 = $request -> opcion3;
        // $collPregunta -> correcta = $request -> correcta;

        if($request->correcta == 'opcion1'){
            $optrue = $request -> opcion1;
        }else if($request->correcta == 'opcion2'){
            $optrue = $request -> opcion2;
        }else if($request->correcta == 'opcion3'){
            $optrue = $request -> opcion3;
        }else{
            $optrue = $request -> correcta;
        }

        $collPregunta -> correcta = $optrue;


        $collPregunta -> idExamen = $request -> idExamen;
        $collPregunta -> save();

        $idExa = $collPregunta->idExamen;
        $examen = Examenes::all()->where('id', $idExa);
        $preguntas = Preguntas::all()->where('idExamen',$idExa);
        return view('sessions.editarexamen', compact('examen','preguntas'));
    }

    public function resultados(){
        $idDocente = auth()->user()->id;
        $listaCal = Notas::all()->where('idDocente', $idDocente);
        $calFinal = Resultados::all()->where('idDocente', $idDocente);
        $sizeRes = sizeof($calFinal);
        return view('sessions.resultadosdocente', compact('listaCal', 'calFinal','sizeRes'));
    }

}