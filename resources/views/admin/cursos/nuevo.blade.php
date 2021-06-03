<!DOCTYPE html>
<html lang="es">
<head>
<title>CursosLosEnlaces</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="{{asset('/css/style2.css')}}">
<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
<link rel="stylesheet" href="{{asset('/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('/css/cursos_familias_movil.css')}}">
<link rel="stylesheet" href="{{asset('/css/miscursos.css')}}">



</head>
<body>
    <div class="bg-image fondo_fijo">
        <div class="site-section border-2 mask-custom">
            <div class="container" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="text-justify p-3 mt-3 w-75">
                        <div class="mb-5"><h1>AGREGAR CURSO</h1></div>
                        <div id="container-form-prof" >
                            <a class="btn btn-danger " href="{{route('admin')}}">Cancelar</a>
                        </div>

                        <div class="container h-75 mt-5 pt-5">
                            <form class="m-5 h-100" action="{{route('cursos.store')}}" method ="post">
                                @csrf

                                <div class="form-group col-sm-5">
                                    <label for="id_nivel">Nivel</label>
                                    <select class="form-control" name="id_nivel">
                                        <option value="1">Grado Medio</option>
                                        <option value="2">Grado Superior</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="id_tipo">Tipo</label>
                                    <select class="form-control" name="id_tipo">
                                        <option value="1">Repaso - Informatica</option>
                                        <option value="2">Ampliación - Informatica</option>
                                        <option value="3">Repaso - Administración</option>
                                        <option value="4">Ampliación - Administración</option>
                                        <option value="5">Repaso - Marketing</option>
                                        <option value="6">Ampliación - Marketing</option>
                                        <option value="7">Repaso - Logística</option>
                                        <option value="8">Ampliación - Logística</option>
                                        <option value="9">Repaso - Otros</option>
                                        <option value="10">Ampliación - Otros</option>
                                    </select>

                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="id_profesor">Profesor</label>
                                    <select class="form-control" name="id_profesor">
                                    @foreach($profesores as $profesor)
                                            <option value="{{$profesor->id}}">{{$profesor->name}} {{$profesor->apellido1}} {{$profesor->apellido2}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" name="nombre">
                                </div>

                                <div class="form-group col-sm-5">
                                    <label for="resumen">Resumen</label>
                                    <div><textarea name="resumen" cols="50" rows="10"></textarea></div>
                                <div>
                                    <button type="submit" class="btn-danger">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/js/jquery-ui.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/aos.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    <script src="{{asset('/js/sheets.js')}}"></script>
</body>
