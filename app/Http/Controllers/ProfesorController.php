<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Archivo;
use App\Models\Curso;
use App\Models\Profesor;
use App\Models\Unidad;
use App\Models\User;
use FilesystemIterator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('Authenticate');
        $this->middleware('EsProfesor');
    }

    /**
     * Muestra la página de los cursos de cada profesor.
     *
     *
     */
    public function index(){

        $id= auth()->user()->id;
        $cursos= Curso::all()->where('id_profesor', '=', $id);
        $contador = 0;
        return view("profesor.miscursos_profesor")->with(['cursos' => $cursos, 'contador' => $contador]);
    }

    /**
     * Muestra el formulario para crear un nuevo profesor.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('admin.profesores.nuevo');

    }

    /**
     * Guarda el profesor creado en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request,['name' => ['required','alpha'], 'apellido1'=> ['required','alpha'], 'apellido2'=> ['required','alpha'],
            'email'=>['required'], 'dni'=>['required','min:9', 'max:9'],'password'=>['required', 'min:8']]);
        DB::beginTransaction();
        $user=new User;
        $user->id_role = 2;
        $user->name = $request->name;
        $user->apellido1 = $request->apellido1;
        $user->apellido2 = $request->apellido2;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->password = bcrypt($request->password); //Password encriptado

        //Comprobar si ya existe el dni entre los usuarios y no agregar el profesor si existe, mostrando mensaje de que ya existe
        $dni = $request->dni;
        $existe = User::where('dni', $dni)->count();
        if($existe == 0) {

            $user->saveOrFail();

            $profesor = new Profesor;
            $profesor->id = $user->id;
            $profesor->saveOrFail();

            if ($user->save() && $profesor->save()) {
                DB::commit();
            } else {
                DB::rollBack();
            }
            $profesores = User::all();
            $profesores = $profesores->where('id_role', '=', 2);

            $cursos = Curso::all();
            $alumnos = User::all();
            $alumnos = $alumnos->where('id_role', '=', 3);
            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "El profesor $user->name $user->apellido1 ha sido agregado"]);
        }else {
            $profesores = User::all();
            $profesores = $profesores->where('id_role', '=', 2);

            $cursos = Curso::all();
            $alumnos = User::all();
            $alumnos = $alumnos->where('id_role', '=', 3);

            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "El profesor $user->name $user->apellido1 no ha sido agregado porque ya existe"]);
        }

    }

    /**
     * Muestra el formulario para editar un profesor.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profesores.edit', compact('user'));
    }

    /**
     * Actualiza los datos de un profesor según su id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['name' => ['required','alpha'], 'apellido1'=> ['required','alpha'], 'apellido2'=> ['required','alpha'],
            'email'=>['required'], 'dni'=>['required','min:9', 'max:9'],'password'=>['required', 'min:8']]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->apellido1 = $request->input('apellido1');
        $user->apellido2 =$request->input('apellido2');
        $user->email = $request->input('email');
        $user->dni = $request->input('dni');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $profesores = User::all();
        $profesores = $profesores->where('id_role', '=', 2);

        $cursos = Curso::all();
        $alumnos = User::all();
        $alumnos = $alumnos->where('id_role', '=', 3);
        return  view("admin.panel_inicio")->with(['cursos' => $cursos,'profesores' => $profesores, 'alumnos' => $alumnos,
            "msj" => "El profesor $user->name $user->apellido1 ha sido actualizado"]);
    }




    /**
     * Elimina un profesor según su id.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        $prof = User::find($id);
        $nombre = $prof->name;
        $apellido1 = $prof->apellido1;

        $prof->delete();
        $profesores = User::All();
        $profesores = $profesores->where('id_role', '=', 2);
        $alumnos = User::All();
        $alumnos = $alumnos->where('id_role', '=', 3);

        $cursos = Curso::all();

        return view("admin.panel_inicio")->with(['cursos' => $cursos,"profesores"=>$profesores,"alumnos"=>$alumnos,
            "msj" => "El profesor $nombre $apellido1 ha sido borrado"]);
    }

    /**
     * Guarda un archivo en el directorio storage/app/public.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|Response
     */
    public function subirArchivo(Request $request){
        DB::beginTransaction();
        $archivo = new Archivo();
        $id_unidad = $request->id_unidad;
        $archivo->id_unidad = $request->id_unidad;
        $archivo->nombre = $request->file('apuntes')->getClientOriginalName();
        $nombre = $request->file('apuntes')->getClientOriginalName();

        $archivo->ruta_apuntes = $request->file('apuntes')->storeAs('/public/pdf',"$nombre");
        $archivo->ruta_tareas = "";
        /*$request->file('apuntes')->storeAs('/public/pdf',"$nombre");;*/

        $existe = Archivo::all()->where('nombre', $nombre)->count();
        if($existe == 0) {

            $archivo->saveOrFail();
            if ($archivo->save()) {
                DB::commit();
                return redirect()->back()
                    ->with('msj', 'Se ha subido corréctamente el fichero');
            } else {
                DB::rollBack();
                return redirect()->back()
                    ->with('msj', 'No se ha podido subir el fichero');
            }

        }
    }

    public function crearTarea(Request $request){
        $id_unidad = $request->id_unidad;
        $id_curso = $request->id_curso;
        return view("profesor.crear_tarea")->with(['id_unidad' => $id_unidad, 'id_curso' =>$id_curso]);
    }

    public function guardarTarea(Request $request)
    {
        $this->validate($request,['nombre_tarea' => ['required']]);
        DB::beginTransaction();
        $archivo =new Archivo();
        $archivo->id_unidad = $request->id_unidad;
        $archivo->nombre = $request->nombre_tarea;
        $archivo->ruta_apuntes = "";
        $archivo->ruta_tareas = $request->ruta_tareas;
        $ruta_tareas = $request->ruta_tareas;
        $nombre_tarea = $request->nombre_tarea;
        $id =$request->id_curso;


           $archivo->saveOrFail();
        Storage::disk('')->makeDirectory("$ruta_tareas/$nombre_tarea");
            if ($archivo->save()) {
                DB::commit();
                $unidades = Unidad::all();
                $unidadesCurso = $unidades->where('id_curso','=',$id);
                $archivos = Archivo::all();
                $archivosUnidad = $archivos->groupBy('id_unidad');
                $msj = "La tarea ha sido creada";
                return view("profesor.cursos_informatica.{$id}_entrar")->with(['id'=>$id, 'unidadesCurso' => $unidadesCurso ,'archivosUnidad' => $archivosUnidad,
                     'msj' => $msj]);

            } else {
                DB::rollBack();
                return redirect()->back()->with('msj', 'La tarea no ha podido ser creada');
            }
    }

    public function borrarTarea(Request $request, $preserve = false){


        $id_curso = $request->id_curso;
        $id_unidad = $request->id_unidad;
        $nombre_tarea = $request->nombre_tarea;
        $keyword = "/public/tareas/$id_curso/$id_unidad";
        $ruta_unidad = Archivo::where('ruta_tareas', 'LIKE','%'.$keyword.'%')->count();
        if($ruta_unidad != 0) {


            $todos_archivos = Archivo::all();
            foreach ($todos_archivos as $tarea) {
                $ruta_tarea = $tarea->ruta_tareas;
                $ruta_tarea_array = explode('/', $ruta_tarea);
                if(sizeof($ruta_tarea_array) >4 && $ruta_tarea_array[4] == $nombre_tarea)
                    $tarea->delete();

            }



            $directorio_tarea = Archivo::where('nombre', 'LIKE','%'.$nombre_tarea.'%');

            File::deleteDirectory(storage_path("app/public/tareas/$id_curso/$id_unidad/$nombre_tarea"));
            $directorio_tarea->delete();

       /* if (! $preserve) {
            @rmdir("/public/tareas/$id_curso/$id_unidad/$nombre_tarea");
        }*/


               $id =$id_curso;
            $unidades = Unidad::all();
            $unidadesCurso = $unidades->where('id_curso', '=', $id);


            $archivos = Archivo::all();
            $archivosUnidad = $archivos->groupBy('id_unidad');

            $msj = "La tarea $nombre_tarea ha sido borrada";
               return view("profesor.cursos_informatica.{$id_curso}_entrar")->with(['msj'=> $msj, 'id'=>$id,
                   'unidadesCurso'=>$unidadesCurso, 'archivosUnidad'=>$archivosUnidad]);
           }
        else
            return redirect()->back()->with('msj', "La tarea $nombre_tarea no ha podido ser borrada");

    }

    public function verTareas(Request $request){

        $ruta_tarea = $request->ruta_tarea;
        $nombre_tarea = $request->nombre_tarea;

        $id_curso = $request->id_curso;
        $id_unidad = $request->id_unidad;



        $ruta_tarea_array = explode('/',$ruta_tarea);
        $id_alumno_tareas = $ruta_tarea_array[5];
        $alumno = User::find($id_alumno_tareas);
        $nombre_alumno = $alumno->name;
        $apellido1_alumno = $alumno->apellido1;
        $apellido2_alumno = $alumno->apellido2;
        $titulo_tarea = $ruta_tarea_array[4];


            return view('profesor.tareas')->with(['nombre_alumno'=>$nombre_alumno,'apellido1_alumno'=>$apellido1_alumno,
                'apellido2_alumno'=>$apellido2_alumno, 'nombre_tarea'=>$nombre_tarea, 'id_unidad'=>$id_unidad, 'id_curso'=>$id_curso,
                'titulo_tarea'=>$titulo_tarea,'id_alumno_tareas' =>$id_alumno_tareas]);

    }


}
