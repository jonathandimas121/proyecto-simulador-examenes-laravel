<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ControllerPDF;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\RegistrerController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;


//HOME INICIO-----------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('home');
}) -> name('home');

//LOGIN VISTA----------------------------------------------------------------------------------------------------
Route::get('/login', [SessionsController::class, 'create'])-> middleware('guest')->name('login.index');
//LOGIN ENVIO
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');


//CERRAR SESION -------------------------------------------------------------------------------------------------
Route::post('/logout', [SessionsController::class, 'destroy'])-> middleware('auth')->name('login.destroy');

//REGISTRAR CUENTA VISTA------------------------------------------------------------------------------------------
Route::get('/register', [RegistrerController::class, 'create'])-> middleware('guest')->name('register.index');
//REGISTRAR CUENTA ENVIO DATOS
Route::post('/register', [RegistrerController::class, 'store'])->name('register.store');


// ----------------------------------<<<<<<<<<DOCENTE>>>>>>>>------------------------------------------------

// HOME DOCENTE--------------------------------------------
Route::get('/homedocente', [DocenteController::class,'create']) -> middleware('auth.docente')-> name('homedocente.index');

// EXAMEN DOCENTE ----------------------------------------------
Route::get('/homedocente/examen',[DocenteController::class,'examen'])->name('homedocente.examen');

// CREAR TITULO EXAMEN
Route::get('/homedocente/examen/tituloexamen',[DocenteController::class,'storeExamen'])->name('homedocente.tituloExamen');
Route::post('/homedocente/examen/tituloexamen',[DocenteController::class,'storeCrearExamen'])->name('homedocente.crearExamen');

// CREAR PREGUNTAS
Route::get('/homedocente/examen/generarexamen',[DocenteController::class,'storePreguntas'])->name('homedocente.preguntaseExamen');

Route::post('/homedocente/examen/generarexamen',[DocenteController::class,'storeCrearPreguntas'])->name('homedocente.crearPreguntas');

// ELIMINAR EXAMEN
Route::delete('/homedocente/examen/{id}', [DocenteController::class, 'destroy'])->name('homedocente.eliminarexamen');

//EDITAR EXAMEN -> LISTAR PREGUNTAS
Route::get('/homedocente/examen/{idExamen}',[DocenteController::class, 'editarExamen'])->name('homedocente.editarExamen');

//Eliminar pregunta
Route::delete('/homeedocente/examen/eliminarpregunta/{idPregunta}',[DocenteController::class, 'destroyPregunta'])->name('homedocente.destroyPregunta');

//AgregarPregunta -> redirecciona al form
Route::get('/homeedocente/examen/agregarpregunta/{idExamen}',[DocenteController::class, 'addPregunta'])->name('homedocente.addPregunta');

//Guardar pregunta
Route::post('/homeedocente/examen/agregarpregunta',[DocenteController::class, 'savePregunta'])->name('homedocente.savePregunta');

//Editar pregunta -> redirecciona al formualrio
Route::get('/homeedocente/examen/editarpregunta/{idExamen}',[DocenteController::class, 'editarPregunta'])->name('homedocente.editarPregunta');

//Editar Pregunta -> Guardar pregunta actualizada
Route::put('/homeedocente/examen/editarpregunta/{collPregunta}',[DocenteController::class, 'saveEditarPregunta'])->name('homedocente.saveEditarPregunta');

// RESULTADOS DOCENTE
Route::get('/homedocente/resultados',[DocenteController::class,'resultados'])->name('homedocente.resultados');


  //DESCARGAR PDF DOCENNTE
  Route::get('/homedocente/resultados/descargarpdfdocente', [ControllerPDF::class, 'downloadPDFDocente'])->name('homedocente.descargarPDFDocente');


// ----------------------------------<<<<<<<<<ALUMNO>>>>>>>>------------------------------------------------

//HOME ALUMNO 
Route::get('/homealumno', [AlumnoController::class,'create']) -> middleware('auth.alumno')->name('homealumno.index');

// EXAMENALUMNO
Route::get('/homealumno/examen',[AlumnoController::class,'examen'])->name('homealumno.examen');

//Mostrar preguntas alumno
Route::get('/homealumno/examen/{idExamen}',[AlumnoController::class, 'listarPreguntasResponder'])->name('alumno.listarPreguntasResponder');

 //Resultado examen
 Route::post('/homealumno/examen/calificacionexamen',[AlumnoController::class, 'calificacionExamen'])->name('alumno.calificacionExamen');


// RESULTADOS ALUMNO
Route::get('/homealumno/resultados',[AlumnoController::class,'resultados'])->name('homealumno.resultados');

 //DESCARGAR PDF ALUMNO
 Route::get('/homealumno/resultados/descargarpdfalumno', [ControllerPDF::class, 'downloadPDFAlumno'])->name('homealumno.descargarPDFAlumno');