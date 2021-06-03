<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Curso;
use App\Models\User;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class AlumnoController extends Controller
{

    public function __construct()
    {
        $this->middleware('Authenticate');
        $this->middleware('EsAlumno');
    }

    public function index(){

        $id= auth()->user()->id;
        $cursos= Alumno::find($id)->cursos;
        $contador = 0;
        return view("alumno.miscursos_alumno")->with(['cursos' => $cursos, 'contador' => $contador]);
    }


    /**
     * Eliminar alumno de la base de datos.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        /*Se buscar el alumno por el id y se elimina, después se buscan todos profesores y alumnos que hay en la BD y se guarda en variables
        para usar en la vista del panel del administrador*/
        $alu = User::find($id);
        $nombre = $alu->name;
        $apellido1 = $alu->apellido1;

        $alu->delete();

        $profesores = User::All();
        $profesores = $profesores->where('id_role', '=', 2);
        $alumnos = User::All();
        $alumnos = $alumnos->where('id_role', '=', 3);

        $cursos = Curso::all();
        return view("admin.panel_inicio")->with(['cursos' => $cursos,"profesores"=>$profesores,"alumnos"=>$alumnos,
            "msj" => "El alumno $nombre $apellido1 ha sido borrado"]);
    }

    public function inscribirse(Request $request){
        $id = $request->input('id');
        $id_curso = $request->input('id_curso');

        $usuario = Alumno::findOrFail($id);
        $usuario->cursos()->attach($id_curso);
        /*$cursos= $usuario->cursos;*/
        $cursos= Alumno::find($id)->cursos;
        $contador = 0;
        return view("alumno.miscursos_alumno")->with(['cursos' => $cursos, 'contador' => $contador, 'msj' => 'Te has inscrito al curso corréctamente']);
    }

    public function desinscribirse(Request $request){
        $id = $request->input('id');
        $id_curso = $request->input('id_curso');

        $usuario = Alumno::findOrFail($id);
        $usuario->cursos()->detach($id_curso);
        /*$cursos= $usuario->cursos;*/
        $cursos= Alumno::find($id)->cursos;
        $contador = 0;
        /*$curso_array = Curso::all()->where('id','=', $id_curso);
        $curso_nombre = $curso_array->nombre;*/
        return view("alumno.miscursos_alumno")->with(['cursos' => $cursos, 'contador' => $contador, 'msj' => 'Te has desinscrito del curso corréctamente']);
    }

    public function eliminar_cuenta_alumno()
    {
        /*Se buscar el alumno por el id y se elimina, después se le envia a una página de aviso de que se ha eliminado la cuenta y deja de
        estar la sesión abierta*/

        $id = auth()->user()->id;
        $alu = User::find($id);
        $nombre = $alu->name;


        $alu->delete();

        Auth::logout();

        $msg = "$nombre tu cuenta ha sido eliminada. Esperamos volverte a ver pronto.";
        //Redireccionamos al inicio de la app con un mensaje
        return view('principal.cuenta_eliminada')->with(['msg' => $msg, 'nombre' => $nombre]);

    }

    public function subirTarea(Request $request)
    {
        DB::beginTransaction();
        $archivo = new Archivo();
        $id_unidad = $request->id_unidad;
        $archivo->id_unidad = $request->id_unidad;
        $archivo->nombre = $request->file('tarea')->getClientOriginalName();
        $nombreFichero = $request->file('tarea')->getClientOriginalName();

        $archivo->ruta_apuntes = "";
        $id_alumno = $request->id_alumno;
        $nombre_tarea = $request->nombre_tarea;
        $id_curso = $request->id_curso;


        $keywords1 = "public/tareas/$id_curso/$id_unidad/$nombre_tarea/$id_alumno";

        $keywords2 = $nombre_tarea;
        $numero_tareas_subidas1 = Archivo::where('ruta_tareas', 'LIKE', '%' . $keywords1 . '%')->count();


        if ($numero_tareas_subidas1 == 0) {/*Si no hay ninguna tarea subida por el alumno a la unidad*/
            $archivo->ruta_tareas = $request->file('tarea')->storeAs('/public/tareas', "$id_curso/$id_unidad/$nombre_tarea/$id_alumno/$nombreFichero");
            $archivo->saveOrFail();
            if ($archivo->save()) {
                DB::commit();
                return redirect()->back()
                    ->with('msj', 'Se ha subido corréctamente la tarea');
            } else {
                DB::rollBack();
                return redirect()->back()
                    ->with('msj', 'No se ha podido subir la tarea');
            }
        } else {/*Si hay una tarea subida por el alumno a la unidad para la misma tarea, primero eliminarla y después subir la nueva tarea del alumno*/

            $todos_archivos = Archivo::all();

            foreach ($todos_archivos as $tarea) {

                $ruta_tarea = $tarea->ruta_tareas;
                $ruta_tarea_array = explode('/', $ruta_tarea);
                if(sizeof($ruta_tarea_array) >5 && $ruta_tarea_array[6] == $id_alumno)
                    $tarea->delete();

            }
            $directorio_tarea = Archivo::where('ruta_tareas', 'LIKE','%'.$keywords1.'%');

            File::deleteDirectory(storage_path("app/public/tareas/$id_curso/$id_unidad/$nombre_tarea/$id_alumno"));
            $directorio_tarea->delete();
            $archivo->ruta_tareas = $request->file('tarea')->storeAs('/public/tareas', "$id_curso/$id_unidad/$nombre_tarea/$id_alumno/$nombreFichero");
            $archivo->saveOrFail();
            if ($archivo->save()) {
                DB::commit();
                return redirect()->back()
                    ->with('msj', 'Se ha subido corréctamente la tarea!');
            } else {
                DB::rollBack();
                return redirect()->back()
                    ->with('msj', 'No se ha podido subir la tarea');
            }

        }
    }}
