<!DOCTYPE html>
<html lang="es">
<head>
    <title>CursosLosEnlaces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('/css/style2.css') }}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <link rel="stylesheet" href="{{asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('/css/aos.css') }}">
    <link rel="stylesheet" href="{{asset('/css/cursos_familias_movil.css') }}">
    <link rel="stylesheet" href="{{asset('/css/miscursos.css') }}">



</head>
<body>
<div class="bg-image fondo_fijo">
    <div class="site-section border-2 mask-custom">
        <div class="container" data-aos="fade-right">
            <div class="row justify-content-center">
                <div class="text-justify p-3 mt-3 w-75">
                    <div class="mb-5"><h1>EDITAR CURSO</h1></div>
                    <div id="container-form-prof" >
                        <a class="btn btn-danger " href="{{route('admin')}}">Cancelar</a>
                    </div>

                    <div class="container h-75 mt-5 pt-5">
                        <form class="m-5 h-100" action="{{route('cursos.update', $curso->id)}}" method ="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group col-sm-5">
                                <label for="id_nivel">id_nivel</label>
                                <input class="form-control" type="text" name="id_nivel" value="{{$curso->id_nivel}}">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="name">id_tipo</label>
                                <input class="form-control" type="text" name="id_tipo" value="{{$curso->id_tipo}}">
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
                                <label for="apellido2">Nombre</label>
                                <input class="form-control" type="text" name="nombre" value="{{$curso->nombre}}">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="direccion">Resumen</label>
                                <input class="form-control" type="text" name="resumen" value="{{$curso->resumen}}">
                            </div>

                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{asset('/js/jquery-ui.js') }}"></script>
<script src="{{asset('/js/bootstrap.min.js') }}"></script>
<script src="{{asset('/js/aos.js') }}"></script>
<script src="{{asset('/js/main.js') }}"></script>
<script src="{{asset('/js/sheets.js') }}"></script>
</body>
