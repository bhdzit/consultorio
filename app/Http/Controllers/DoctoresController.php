<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class DoctoresController extends Controller
{
    //

    function obtenerVistaDoctores(){

      return view("admin.listadoctores",["doctores"=>$this->obtenerDoctores()]);  
    }


    function obtenerDoctores(){
        return User::where("tipUsuario","=","D")->get();
    }
     function obtenerVistaDoctoresPAraConsulta(){
        return view('nuevaconsulta',["doctores"=>$this->obtenerDoctores()]);
     }

    function registrarDoctor(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'last_name' => 'required|string|max:255',
            'sec_last_name' => 'required|string|max:255',

        ]);

        $user = User::create([
            'nombre' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apPaterno'=>$request->last_name,
            'apMaterno'=>$request->sec_last_name,
            'numero'=>$request->tel,
            'tipUsuario'=>"D"
        ]);

        
        return redirect()->route('listadedoctores');

    }

}
