<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Aplicacion extends Controller
{

    public function index()
    {
        $familias = DB::table('tipos')
            ->select('familia')
            ->distinct()
            ->get();

        $niveles = DB::table('niveles')
            ->select('nombre')
            ->distinct()
            ->get();

        $tipos = DB::table('tipos')
            ->select('nombre')
            ->distinct()
            ->get();

        $contador = 1;

        return view("principal.inicio")->with(['familias' => $familias, 'contador' =>$contador, 'niveles'=>$niveles, 'tipos' =>$tipos]);
    }

    public function listar(Request $request){


        $familia = $request->familia;
        $nivel = $request->nivel;
        $tipo = $request->tipo;

        if($familia == 'informatica' && $tipo == 'repaso'){
            $id_familia_tipo = 1;
        }
        elseif($familia == 'informatica' && $tipo == 'ampliacion'){
            $id_familia_tipo = 2;
        }
        elseif($familia == 'administracion' && $tipo == 'repaso'){
            $id_familia_tipo = 3;
        }
        elseif($familia == 'administracion' && $tipo == 'ampliacion'){
            $id_familia_tipo = 4;
        }
        elseif($familia == 'marketing' && $tipo == 'repaso'){
            $id_familia_tipo = 5;
        }
        elseif($familia == 'marketing' && $tipo == 'ampliacion'){
            $id_familia_tipo = 6;
        }
        elseif($familia == 'logistica' && $tipo == 'repaso'){
            $id_familia_tipo = 7;
        }
        elseif($familia == 'logistica' && $tipo == 'ampliacion'){
            $id_familia_tipo = 8;
        }
        elseif($familia == 'otros' && $tipo == 'repaso'){
            $id_familia_tipo = 9;
        }
        elseif($familia == 'otros' && $tipo == 'ampliacion'){
            $id_familia_tipo = 10;
        }

        if($nivel  == 'grado medio'){
            $id_nivel = 1;
        }
        elseif($nivel  == 'grado superior'){
            $id_nivel = 2;
        }
        $cursos = Curso::all()->where('id_nivel', '=', $id_nivel)->where('id_tipo', '=', $id_familia_tipo);

        $familias = DB::table('tipos')
            ->select('familia')
            ->distinct()
            ->get();

        $niveles = DB::table('niveles')
            ->select('nombre')
            ->distinct()
            ->get();

        $tipos = DB::table('tipos')
            ->select('nombre')
            ->distinct()
            ->get();

        $contador = 1;

        $fam = Tipo::all()->where('familia', '=', $familia)->first;


        return view("principal.inicio")->with(['familias' => $familias, 'contador' =>$contador, 'niveles'=>$niveles, 'tipos' =>$tipos, 'cursos' =>$cursos, 'fam'=>$fam]);

    }

    public function todos_cursos(){

        $todos_cursos = Curso::all();

               return view("principal.buscador_cursos.todos")->with(['todos_cursos'=>$todos_cursos]);
    }

    public function informatica(){

        return view("principal.informatica");
    }

    public function administracion(){

        return view("principal.administracion");
    }

    public function logistica(){

        return view("principal.logistica");
    }

    public function marketing(){

        return view("principal.marketing");
    }

    public function matematicas(){

        return view("principal.matematicas");
    }

    public function editar_alumno_profesor(Request $request)
    {
        $this->validate($request,array('email' => 'required', 'contraseña'=> ['required', 'min:8'], 'rep_contraseña' =>'required'));

        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('contraseña'));
        $re_password = $request->input('rep_contraseña');
        $pass = $request->input('contraseña');

        if($pass != $re_password) {

            return redirect()->back()->with('success', 'La contraseña no ha sido corréctamente escrita');
        }else {
            $user->save();

            return redirect()->back()->with('success', 'Has actualizado tus datos corréctamente');
        }
    }

    public function ver_pdf(Request $request){
        $nombre_fichero = $request->nombre_fichero;

        $ruta = storage_path("app/public/pdf/$nombre_fichero");

        return response()->file($ruta);
    }

    public function visualizar_pdf_tareas(Request $request){
        $nombre_tarea = $request->nombre_tarea;

        $id_curso = $request->id_curso;
        $id_unidad = $request->id_unidad;
        $id_alumno = $request->id_alumno;
        $titulo_tarea = $request->titulo_tarea;

        $ruta = storage_path("app/public/tareas/$id_curso/$id_unidad/$titulo_tarea/$id_alumno/$nombre_tarea");

        return response()->file($ruta);
    }

    public function descargar_pdf(Request $request){
        $nombre_fichero = $request->nombre_fichero;

        $myFile = storage_path("app/public/pdf/$nombre_fichero");
        $headers = ['Content-Type: application/pdf'];


        return response()->download($myFile, $nombre_fichero, $headers);
    }

    public function descargar_pdf_tareas(Request $request){
        $nombre_tarea = $request->nombre_tarea;

        $id_curso = $request->id_curso;
        $id_unidad = $request->id_unidad;
        $id_alumno = $request->id_alumno;
        $titulo_tarea = $request->titulo_tarea;

        $myFile = storage_path("app/public/tareas/$id_curso/$id_unidad/$titulo_tarea/$id_alumno/$nombre_tarea");
        $headers = ['Content-Type: application/pdf'];


        return response()->download($myFile, $nombre_tarea, $headers);
    }
}
