<!DOCTYPE html>
<html lang="es">
<head>
    <title>CursosLosEnlaces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cursos_familias_movil.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/miscursos.css') }}">



</head>
<body>
<div class="bg-image fondo_fijo">
    <div class="site-section border-2 mask-custom">
        <div class="container" data-aos="fade-right">
            <div class="row justify-content-center">
                <div class="text-justify p-3 mt-3 w-75">
                    <div class="mb-5"><h1>AGREGAR UNIDAD</h1></div>
                    <div id="container-form-prof" >
                        <a class="btn btn-danger" href="{{URL::previous()}}">Cancelar</a>
                    </div>
                    <div>

                        @if($errors->count() >0)
                            @foreach($errors->all() as $error)
                                <h4 class="text-danger font-weight-bold mt-2">Error. {{$error}}</h4>
                            @endforeach
                        @endif
                    </div>
                    <div class="container h-75 pt-3">

                        <form class="m-5 h-100" action="{{route('guardar_unidad')}}" method ="get">


                            <div class="form-group col-sm-5">
                                <label for="id_curso">id_curso</label>
                                <input class="form-control" type="text" name="id_curso"  value="{{$id_curso}}">
                            </div>

                            <div class="form-group col-sm-5">
                                <label for="titulo">T??tulo</label>
                                <input class="form-control" type="text" name="titulo">
                            </div>

                            <div class="form-group col-sm-5">
                                <label for="indice">??ndice</label>
                                <input class="form-control" type="text" name="indice">
                            </div>

                            <button type="submit" class="btn-danger">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/aos.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/sheets.js') }}"></script>
</body>
