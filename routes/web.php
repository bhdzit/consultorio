<?php

use App\Http\Controllers\DoctoresController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $rolDeUsuario=auth()->user()->tipUsuario;
    
    if($rolDeUsuario=="P"){
        return view('nuevaconsulta');
    }
    if($rolDeUsuario=="D"){
        return redirect()->route('perfildoctor');
    }

    if($rolDeUsuario=="A"){
        return redirect()->route('listadedoctores');
    }



    return ; //view('nuevaconsulta');
})->middleware("auth");

Route::get('/dashboard', [DoctoresController::class,"obtenerVistaDoctoresPAraConsulta"])->middleware(['auth'])->name('dashboard');

Route::get("home" ,function(){
    return view('layouts.adminlayout');
});

Route::get("perfildedoctor" ,function(){
    return view('perfildoctor');
})->name("perfildoctor");

Route::get("agregardoctor" ,function(){
    return view('admin.adddoctor');
});


Route::get("listadedoctores" ,[DoctoresController::class,"obtenerVistaDoctores"])->middleware("auth")->name("listadedoctores");

Route::post('/registerdoc',[DoctoresController::class,"registrarDoctor"])->middleware("auth")->name("registerdoc");

require __DIR__.'/auth.php';
