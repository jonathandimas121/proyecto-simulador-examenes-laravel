<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    
    public function store(){
        if(auth()->attempt(request(['usuario','password']))==false){
            return back()->withErrors([
                'message' => 'El usuario y/o contraseña son incorrectas. Intentalo de nuevo'
            ]);
        }else if(auth()->attempt(request(['usuario','password']))==true){
            if(auth()->user()->tipoUsuario == 'Docente'){
                return  redirect()->to('/homedocente');
            }else{
                return  redirect()->to('/homealumno');
            }
        }
    }
    
    //Cerrar sesion
    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->to('/')->with('logout','saliste');
    }
}
