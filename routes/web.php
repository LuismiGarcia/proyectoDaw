<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnoController;

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
    /*$user = Auth::user();

        if ($user->esAdmin()) {
            echo "Eres usuario administrador";
        } elseif ($user->esProfesor()) {
            echo "Eres profesor";
        } else
            echo "Eres alumno";*/

    return view('welcome');
});

Route::get('inicio', function () {
    return view('principal.inicio');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("informatica", "App\Http\Controllers\Aplicacion@informatica");
Route::get("administracion", "App\Http\Controllers\Aplicacion@administracion");
Route::get("logistica", "App\Http\Controllers\Aplicacion@logistica");
Route::get("marketing", "App\Http\Controllers\Aplicacion@marketing");
Route::get("matematicas", "App\Http\Controllers\Aplicacion@matematicas");


Route::fallback(function (){
    return view('notfound');
});

Auth::routes();/*Necesario para ver página de login y registro*/

Route::get('/administrador', [AdminController::class, 'index']);

Route::get('/miscursos', [ProfesorController::class, 'index']);
Route::get('/miscursos1', [AlumnoController::class, 'index']);
