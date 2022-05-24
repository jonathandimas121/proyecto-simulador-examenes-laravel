<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrerController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    
    // validar campos del formulario
    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'usuario' => 'required|unique:users,usuario',
            'email' => 'required|unique:users,email',
            'tipoUsuario' => 'required',
            'password' => 'required',
        ]);

        $user = User::create(request(['name','usuario','email', 'tipoUsuario','password']));
        // auth()->login($user);
        return redirect()->to('/');
    }
}
