<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('Authenticate');
        $this->middleware('EsAdmin');
    }

    public function index(){

        $cursos = Curso::all();

        $profesores = User::all();
        $profesores = $profesores->where('id_role', '=', 2);

        $alumnos = User::all();
        $alumnos = $alumnos->where('id_role', '=', 3);
        return view("admin.panel_inicio")->with(['cursos' => $cursos,'profesores' => $profesores, 'alumnos' => $alumnos]);
    }




}
