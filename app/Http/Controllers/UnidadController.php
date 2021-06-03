<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Curso;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UnidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('Authenticate');

    }

    public function create(Request $request){
        $id_curso = $request->id_curso;

        return view("profesor.agregar_unidad")->with(['id_curso' => $id_curso]);
    }

    /**
     * Guarda el profesor creado en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|Response
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request,['id_curso' => ['required'], 'titulo' => ['required'], 'indice'=> ['required']]);
        DB::beginTransaction();
        $unidad =new Unidad;
        $unidad->id_curso = $request->id_curso;
        $unidad->titulo = $request->titulo;
        $unidad->indice = $request->indice;

        $id =$unidad->id_curso;
        //Comprobar si ya existe el titulo entre las unidades y no agregar ese titulo si existe, mostrando mensaje de que ya existe
        $titulo = $request->titulo;
        $existe = Unidad::where('titulo', $titulo)->count();
        if($existe == 0) {

            $unidad->saveOrFail();

            if ($unidad->save()) {
                DB::commit();
                $unidades = Unidad::all();
                $unidadesCurso = $unidades->where('id_curso','=',$id);
                $archivos = Archivo::all();
                $archivosUnidad = $archivos->groupBy('id_unidad');
                $msj = "La unidad ha sido creada";
                    return view("profesor.cursos_informatica.{$id}_entrar")->with(['id'=>$id, 'unidadesCurso' => $unidadesCurso ,'archivosUnidad' => $archivosUnidad, 'msj' => $msj]);

            } else {
                DB::rollBack();
            }

        }else {
            $msj = "La unidad no ha podido ser creada";
            return redirect()->back()->with('msj', $msj);
        }

    }


}
