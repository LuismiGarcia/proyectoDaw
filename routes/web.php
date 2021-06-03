<?php

use App\Http\Controllers\UnidadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\Aplicacion;

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

    return view('welcome');
});

/*Página principal*/
Route::get('/inicio', [Aplicacion::class, 'index'])->name('home');
Route::post('/inicio', [Aplicacion::class, 'listar'])->name('buscar');

/*Páginas buscador cursos*/
/*Todos cursos*/
Route::get('/todos_cursos', [Aplicacion::class, 'todos_cursos'])->name('todos_cursos');

/*Rutas de cada familia profesional donde se muestran sus cursos*/
Route::get("informatica", "App\Http\Controllers\Aplicacion@informatica")->name('informatica');
Route::get("administracion", "App\Http\Controllers\Aplicacion@administracion")->name('administracion');
Route::get("logistica", "App\Http\Controllers\Aplicacion@logistica")->name('logistica');
Route::get("marketing", "App\Http\Controllers\Aplicacion@marketing")->name('marketing');
Route::get("matematicas", "App\Http\Controllers\Aplicacion@matematicas")->name('matematicas');

/*Rutas de página principal de presentación de cada curso de informática según su id*/
Route::get("informatica/id={id}", function ($id){
    $id_curso = $id;
   return view("cursos_informatica.$id")->with(['id_curso' =>$id_curso]);
});


/*Rutas de página específica de cada alumno o profesores de cada curso. En el middleware se verifica que haya iniciado sesión*/
Route::get("/informatica/id={id}/entrarProfesor", "App\Http\Controllers\CursoController@index");
Route::get("/informatica/id={id}/entrarAlumno", "App\Http\Controllers\CursoController@index2");

/*Ruta para leer o eliminar conversaciones. Sólo accesible si se ha registrado. Si no es enviado al login*/
Route::get("/mensajes", function (){
    if(auth()->user())
        return view('principal.mensajes');
    else
        return view('auth.login');
})->name('mensajes');;

/*Ruta para configurar email y contraseña o eliminar cuenta (esto últimosólo para alumnos). Sólo accesible si se ha registrado.
Si no es enviado al login*/
Route::get("/micuenta", function (){
    if(auth()->user())
        return view('principal.micuenta');
    else
        return view('auth.login');
})->name('mi_cuenta');

/*Ruta al hacer click en cerrar sesión*/
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('salir');
Auth::routes();/*Necesario para ver página de login y registro*/

Route::get('/administrador', [AdminController::class, 'index'])->name('admin');

/*Ruta para ver la página privada de cursos para profesores. A través del controlador y el middleware, reconoce si no es profesores
y lo reenvía a inicio*/
Route::get('/miscursos_profesor', [ProfesorController::class, 'index'])->name('cursos_profesor');
Route::get('/miscursos_alumno', [AlumnoController::class, 'index'])->name('cursos_alumno');

/*Rutas para que se creen las rutas y métodos que usará el administrador para crear profesores y cursos o eliminar alumnos*/
Route::resource("profesores", App\Http\Controllers\ProfesorController::class);
Route::resource("alumnos", App\Http\Controllers\AlumnoController::class)->only('destroy');
Route::resource("cursos", App\Http\Controllers\CursoController::class);

/*Ruta para cuando se inscribe un alumno en un curso usando el método inscribirse*/
Route::get('/miscursos', [AlumnoController::class,'inscribirse']);
Route::get('/desinscribirse', [AlumnoController::class,'desinscribirse']);

/*Ruta para subir archivos los profesores*/
Route::post('/subir','\App\Http\Controllers\ProfesorController@subirArchivo')->name('subir');

/*Ruta para subir tareas los alumnos*/
Route::post('/subirTarea','\App\Http\Controllers\AlumnoController@subirTarea')->name('subirTarea');

/*Ruta para agregar una unidad a un curso el profesor del curso*/
Route::get('/agregar_unidad', [UnidadController::class, 'create'])->name('agregar_unidad');
Route::get('/guardar_unidad', [UnidadController::class, 'store'])->name('guardar_unidad');

/*Ruta para crear una tarea por el profesor del curso*/
Route::get('/crear', '\App\Http\Controllers\ProfesorController@crearTarea')->name('crear_tarea');
Route::post('/guardar', '\App\Http\Controllers\ProfesorController@guardarTarea')->name('guardar_tarea');
Route::get('/borrar', '\App\Http\Controllers\ProfesorController@borrarTarea')->name('borrar_tarea');
Route::get('/ver', '\App\Http\Controllers\ProfesorController@verTareas')->name('ver_tareas');

/*Ruta para que el alumno elimine su cuenta*/
Route::get('/eliminar_alumno', [AlumnoController::class, 'eliminar_cuenta_alumno'])->name('eliminar_cuenta_alumno');

/*Ruta para que el alumno o profesor edite su email y/o contraseña*/
Route::put('/editar', [Aplicacion::class, 'editar_alumno_profesor'])->name('editar');

/*Ruta para ver ficheros pdf (apuntes)*/
Route::post('/ver_pdf', [Aplicacion::class, 'ver_pdf'])->name('ver_pdf');
/*Ruta para descargar ficheros pdf (apuntes)*/
Route::get('/descargar_pdf', [Aplicacion::class, 'descargar_pdf']);

/*Ruta para ver ficheros pdf (tareas)*/
Route::get('/ver_tarea_pdf', [Aplicacion::class, 'visualizar_pdf_tareas'])->name('ver_tarea_pdf');

/*Ruta para descargar ficheros pdf (tareas)*/
Route::get('/descargar_tarea_pdf', [Aplicacion::class, 'descargar_pdf_tareas'])->name('descargar_tarea_pdf');


Route::fallback(function (){

    return view('notfound');
});

