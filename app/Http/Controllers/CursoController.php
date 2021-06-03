<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Profesor;
use App\Models\Tipo;
use App\Models\Unidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class CursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('Authenticate');
    }

    public function index($id)
    {
        $user = Auth::user();
        if ($user->esProfesor()){

        $unidades = Unidad::all();
        $unidadesCurso = $unidades->where('id_curso', '=', $id);


        $archivos = Archivo::all();
        $archivosUnidad = $archivos->groupBy('id_unidad');

        return view("profesor.cursos_informatica.{$id}_entrar")->with(['id' => $id, 'unidadesCurso' => $unidadesCurso, 'archivosUnidad' => $archivosUnidad]);
    }else{
            return redirect('/inicio');
        }
    }

    public function index2($id){
        $user = Auth::user();
        if (!$user->esProfesor()){
        $unidades = Unidad::all();
        $unidadesCurso = $unidades->where('id_curso','=',$id);

        $archivos = Archivo::all();
        $archivosUnidad = $archivos->groupBy('id_unidad');

        return view("alumno.cursos_informatica.{$id}_entrar")->with(['id'=> $id, 'unidadesCurso' =>$unidadesCurso, 'archivosUnidad' =>$archivosUnidad]);
        }else {
            return redirect('/inicio');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $profesores = User::All();
        $profesores = $profesores->where('id_role', '=', 2);

        return view('admin.cursos.nuevo', ['profesores'=>$profesores]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     * @throws Throwable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $curso =new Curso;
        $curso->id_nivel = $request->id_nivel;
        $curso->id_tipo = $request->id_tipo;
        $curso->id_profesor = $request->id_profesor;
        $curso->nombre = $request->nombre;
        $curso->resumen = $request->resumen;


        //Comprobar si ya existe el nombre entre los cursos y no agregar el curso si existe, mostrando mensaje de que ya existe

        $nombre = $request->nombre;
        $cursos = Curso::all();
        $existe = $cursos->where('nombre', $nombre)->count();


        if($existe == 0) {
            $curso->saveOrFail();


            if ($curso->save()) {
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
                "msj" => "El curso $curso->nombre ha sido agregado"]);
        }else {
            $profesores = User::all();
            $profesores = $profesores->where('id_role', '=', 2);

            $cursos = Curso::all();
            $alumnos = User::all();
            $alumnos = $alumnos->where('id_role', '=', 3);

            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "El curso $curso->nombre no ha sido agregado porque ya existe"]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $profesores = User::All();
        $profesores = $profesores->where('id_role', '=', 2);

        return view('admin.cursos.edit', compact('curso','profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->id_nivel = $request->input('id_nivel');
        $curso->id_tipo = $request->input('id_tipo');
        $curso->id_profesor =$request->input('id_profesor');
        $curso->nombre = $request->input('nombre');
        $curso->resumen = $request->input('resumen');

        $cursos = Curso::all();
        $usuarios = User::all();
        $alumnos = $usuarios->where('id_role', '=', 3);

        $profesores = $usuarios->where('id_role', '=', 2);

        //Caso de insertar un id_nivel mayor del número del id_nivel máximo (2 en este caso) o menor o igual que 0
        $num_niveles = Nivel::with('id')->distinct()->count();
        if($request->input('id_nivel') > $num_niveles || $request->input('id_nivel') <= ($num_niveles - $num_niveles)) {
            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "¡ERROR: El nivel no puede ser 0, menor de 0 o mayor de $num_niveles!"]);
        }
        //Caso de insertar un id_tipo mayor del número del id_tipo máximo (10 en este caso) o menor o igual que 0
        $num_tipos = Tipo::with('id')->distinct()->count();
        if($request->input('id_tipo') > $num_tipos || $request->input('id_tipo') <= ($num_tipos - $num_tipos)) {
            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "¡ERROR: El nivel no puede ser 0, menor de 0 o mayor de $num_tipos!"]);
        }

        //Caso de insertar un nombre de curso que ya existe
        $nombre_curso = $request->input('nombre');
        $existe = Curso::where('nombre', $nombre_curso)->count();
        if($existe != 0) {

            return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "¡ERROR: El nombre del curso '$nombre_curso' ya existe!"]);
        }
        //Caso de insertar un id_profesor que no exista
        $id_profesor = $request->input('id_profesor');
        try {
            $curso->save();
        }catch(Throwable $e){
                    return view("admin.panel_inicio")->with(['cursos' => $cursos, 'profesores' => $profesores, 'alumnos' => $alumnos,
                "msj" => "¡ERROR: El id_profesor $id_profesor no existe!"]);
        }
        $cursos = Curso::all();
        $usuarios = User::all();
        $alumnos = $usuarios->where('id_role', '=', 3);

        $profesores = $usuarios->where('id_role', '=', 2);
        return  view("admin.panel_inicio")->with(['cursos' => $cursos,'profesores' => $profesores, 'alumnos' => $alumnos,
            "msj" => "El curso ha sido actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $nombre = $curso->name;

        $curso->delete();
        $usuarios = User::All();
        $profesores = $usuarios->where('id_role', '=', 2);
        $alumnos = $usuarios->where('id_role', '=', 3);

        $cursos = Curso::all();

        return view("admin.panel_inicio")->with(['cursos' => $cursos,"profesores"=>$profesores,"alumnos"=>$alumnos,
            "msj" => "El curso $nombre ha sido borrado"]);
    }


}
