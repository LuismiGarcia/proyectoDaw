<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
</head>

<body class="bg-info">
<div class="position-sticky m-2">
    <a class="btn btn-primary text-white" href="{{route('salir')}}">Cerrar Sesión</a>
</div>
<div class="site-section contenido border-2">
    <div class="container mt-0 ml-5 w-100 opacity-4" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-sm-12 text-justify p-2">
                <div class="site-section-title">
                    <h1 class="text-black font-weight-bold p-3 bg-light opacity-5">Panel de Administración<h5 class="float-right text-danger ">{{$msj ?? '' }}</h5></h1>

                    <ul class="tabs">
                        <li><a href="#tab1" class="bg-success text-white font-weight-bold">Cursos</a></li>
                        <li><a href="#tab2" class="bg-warning text-white font-weight-bold">Alumnos</a></li>
                        <li><a href="#tab3" class="bg-primary text-white font-weight-bold">Profesores</a></li>

                    </ul>

                    <div class="tab_container tabs">
                        <div class="tab_content" id="tab1">
                            <div class="m-2">
                                <a href="{{route('cursos.create')}}" class="btn btn-success text-white font-weight-bold">Añadir Curso</a>
                            </div>


                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                <thead class="bg-warning text-black">
                                    <tr>
                                        <th>Nivel</th>
                                        <th>Tipo - Familia</th>
                                        <th>id_profesor</th>
                                        <th>Nombre</th>
                                        <th>Resumen</th>

                                        <th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @foreach($cursos->sortBy('nombre', SORT_NATURAL|SORT_FLAG_CASE) as $curso)
                                    <tr>
                                        @if($curso->id_nivel == 1)
                                        <td>Grado Medio</td>
                                        @else
                                        <td>Grado Superior</td>

                                        @endif
                                        @switch($curso->id_tipo)
                                        @case (1)
                                             <td>Repaso - Informática</td>
                                                @break
                                        @case (2)
                                             <td>Ampliación - Informática</td>
                                                @break
                                        @case (3)
                                             <td>Repaso - Administración</td>
                                                @break
                                         @case (4)
                                             <td>Ampliación - Administración</td>
                                                @break
                                        @case (5)
                                             <td>Repaso - Marketing</td>
                                                @break
                                        @case (6)
                                             <td>Ampliación - Marketing</td>
                                                @break
                                        @case (7)
                                             <td>Repaso - Logística</td>
                                                @break
                                        @case (8)
                                             <td>Ampliación - Logística</td>
                                                @break
                                        @case (9)
                                             <td>Repaso - Otros</td>
                                                @break
                                        @case (10)
                                             <td>Ampliación - Otros</td>
                                                @break
                                        @endswitch
                                        <td>{{$curso->id_profesor}}</td>
                                        <td>{{$curso->nombre}}</td>
                                        <td>{{$curso->resumen}}</td>

                                        <td>
                                            <a href="{{route('cursos.edit', $curso->id)}}"><button class="btn btn-success">Modificar</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ url("cursos/{$curso->id}") }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button id="button" class="btn btn-danger">Eliminar</button>
                                            </form>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tr>

                                </tbody>
                            </table>
                        </div>


                        <div class="tab_content" id="tab2">
                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                <thead class="bg-warning text-black">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido1</th>
                                    <th>Apellido2</th>
                                    <th>email</th>
                                    <th>dni</th>
                                    <th>Acción</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @foreach($alumnos->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $alu)
                                    <tr>
                                        <td>{{$alu->name}}</td>
                                        <td>{{$alu->apellido1}}</td>
                                        <td>{{$alu->apellido2}}</td>
                                        <td>{{$alu->email}}</td>
                                        <td>{{$alu->dni}}</td>

                                        <td>
                                            <form action="{{ url("alumnos/{$alu->id}") }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button id="button" class="btn btn-danger">Eliminar</button>
                                            </form>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="tab_content" id="tab3">
                            <div class="m-2">
                                <a href="{{route('profesores.create')}}" class="btn btn-primary text-white font-weight-bold">Añadir Profesor</a>
                            </div>


                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                <thead class="bg-warning text-black">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido1</th>
                                    <th>Apellido2</th>
                                    <th>email</th>
                                    <th>dni</th>
                                    <th>Cursos</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @foreach($profesores->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE) as $prof)
                                    <tr>
                                        <td>{{$prof->name}}</td>
                                        <td>{{$prof->apellido1}}</td>
                                        <td>{{$prof->apellido2}}</td>
                                        <td>{{$prof->email}}</td>
                                        <td>{{$prof->dni}}</td>

                                        <td></td>
                                        <td>
                                            <a href="{{route('profesores.edit', $prof->id)}}"><button class="btn btn-success">Modificar</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ url("profesores/{$prof->id}") }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button id="button" class="btn btn-danger">Eliminar</button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/sheets.js') }}"></script>

</body>
</html>
