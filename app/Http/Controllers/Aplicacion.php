<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aplicacion extends Controller
{
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
}
