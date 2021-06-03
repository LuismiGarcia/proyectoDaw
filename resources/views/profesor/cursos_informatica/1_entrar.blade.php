@extends("layout")

@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('/images/miscursos.jpg')}}');">
        <div class="site-section border-2">
            <div class="unidades container mt-3  ml-3 col-7 opacity-4" data-aos="fade-up">
                <div class="row justify-content-center ">
                    <div class="text-justify p-3 mt-5  bg-secondary rounded" >
                        <div class="text-center bg-warning rounded"><h1 class="font-weight-bold">Curso de Interfaces para JAVA con Swing</h1></div>
                        <form action="{{route('agregar_unidad')}}" method="get">


                            <input type="hidden" name="id_curso" value="{{$id}}">
                        <div><input class="btn btn-success font-weight-bold" type="submit" value="Agregar unidad"></div>

                        </form>

                        <div class="text-black font-weight-bold">{{$msj ?? ''}}</div>
                        @if(session()->has('msj'))
                            <div class="alert alert-success">
                                {{ session()->get('msj') }}
                            </div>
                        @endif
                        @foreach($unidadesCurso as $unidad)
                        <div class="border border-white rounded mt-2">
                            <table class="m-3 border-white table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-white bg-dark"><h4>{{$unidad->titulo}}</h4></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-info text-primary">
                                    <tr class="font-weight-bold">
                                        <td>APUNTES</td>
                                        <td>
                                            <form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="apuntes" class="font-weight-bold text-white">Subir apuntes a la unidad</label>
                                                    <input type="hidden" name="id_unidad" value="{{$unidad->numero}}">
                                                    <input type="file" class="form-control-file" id="apuntes" name="apuntes" required>
                                                    <input class="btn btn-success font-weight-bold" type="submit" value="Subir">

                                                </div>
                                            </form>
                                        </td>
                                    </tr>

                                    @foreach($archivosUnidad as $archivo)

                                        @foreach($archivo as $fichero)
                                           @if($fichero->id_unidad == $unidad->numero && $fichero->ruta_tareas == null)
                                    <tr>
                                        <td>{{$fichero->nombre}}</td>
                                        <td class="text-white text-center">
                                            <form method="get" action="{{url("descargar_pdf")}}">
                                                <input type="hidden" name="nombre_fichero" value="{{$fichero->nombre}}">
                                                <input class="btn btn-danger font-weight-bold" type="submit" value="Descargar">
                                            </form>

                                            <form method="POST" action="{{route('ver_pdf')}}">
                                                @csrf
                                                <input type="hidden" name="nombre_fichero" value="{{$fichero->nombre}}">
                                                <input class="btn btn-success font-weight-bold m-1" type="submit" value="Ver">
                                            </form>

                                        </td>
                                    </tr>
                                           @endif
                                        @endforeach

                                </tbody>
                            </table>
                                        <div class="ml-3">
                                            <form action="{{route('crear_tarea')}}" method="get">

                                                <div class="form-group">
                                                    <input type="hidden" name="id_unidad" value="{{$unidad->numero}}">
                                                    <input type="hidden" name="id_curso" value="{{$id}}">
                                                    <input class="btn btn-warning text-center font-weight-bold" type="submit" value="Crear tarea">

                                                </div>
                                            </form>
                                        </div>
                                <table class="m-3 border-dark table-bordered table-hover">


                                        @foreach($archivo as $fichero)
                                                    @if($fichero->id_unidad == $unidad->numero && $fichero->ruta_apuntes == null && $fichero->ruta_tareas == "/public/tareas/$id/$unidad->numero")
                                                        <tr>
                                                            <td class="bg-info text-white font-weight-bold text-center p-2">{{$fichero->nombre}}</td>
                                                            <td class="text-center pt-3">
                                                                <form action="{{route('borrar_tarea')}}" method="get">

                                                                    <div class="form-group">
                                                                        <input type="hidden" name="ruta_tarea" value="{{$fichero->ruta_tareas}}">
                                                                        <input type="hidden" name="id_unidad" value="{{$unidad->numero}}">
                                                                        <input type="hidden" name="id_curso" value="{{$id}}">
                                                                        <input type="hidden" name="nombre_tarea" value="{{$fichero->nombre}}">
                                                                        <input class="btn btn-danger font-weight-bold" type="submit" value="Borrar tarea">

                                                                    </div>
                                                                </form>

                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="bg-primary text-white font-weight-bold text-center p-2">TAREAS ENTREGADAS</td>
                                                            <td class="bg-primary text-white font-weight-bold text-center p-2">Fecha</td>
                                                        </tr>
                                                    @endif

                                                    @if($fichero->id_unidad == $unidad->numero && $fichero->ruta_apuntes == null &&
                                                    $fichero->ruta_tareas != "/public/tareas/$id/$unidad->numero")

                                                        <tr>

                                                           <td class="text-center pt-3">
                                                                <form action="{{route('ver_tareas')}}" method="get">

                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id_unidad" value="{{$unidad->numero}}">
                                                                        <input type="hidden" name="id_curso" value="{{$id}}">
                                                                        <input type="hidden" name="nombre_tarea" value="{{$fichero->nombre}}">
                                                                        <input type="hidden" name="ruta_tarea" value="{{$fichero->ruta_tareas}}">
                                                                        <input class="btn btn-success font-weight-bold" type="submit" value="Ver tarea">

                                                                    </div>
                                                                </form>

                                                            </td>
                                                            <td>
                                                                {{$fichero->created_at}}
                                                            </td>


                                                        </tr>
                                                    @endif
                                        @endforeach

                                </table>
                                    @endforeach



                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
                    <div class="sesiones border border-white rounded mt-2 bg-light col-4 ml-1 position-absolute">
                        <table class="m-3 border-white table-bordered table-hover">

                                <tr>
                                    <th class="text-white bg-dark"><h4>PROXIMAS SESIONES ONLINE</h4></th>
                                    <th class="text-white bg-dark"><a class="btn btn-primary">Nueva sesión</a></th>
                                </tr>
                        </table>
                        <table class="border w-75 border-dark rounded m-3  bg-light table-responsive">
                                <tr class="border border-dark">
                                    <th class="border-right">TEMA</th>
                                    <td>Ejemplo práctico de creación de paneles</td>
                                </tr>
                                <tr class="border border-dark">
                                    <th class="border-right">ENLACE</th>
                                    <td class="alert-link"><a href="https://meet.google.com/xxxxxxxx">pulsa aquí para acceder</a></td>
                                </tr>
                                <tr class="border border-dark">
                                    <th class="border-right">FECHA</th>
                                    <td>15/06/2021</td>
                                </tr>
                                <tr class="border border-dark">
                                    <th class="border-right">HORA</th>
                                    <td>10:00</td>
                                </tr>
                                <tr class="border border-dark">
                                    <th class="border-right">ACCIONES</th>
                                    <td>


                                                <a class="btn btn-warning text-dark text-center">Editar sesión</a>

                                                <a class="btn btn-dark text-white text-center">Borrar sesión</a>

                                        </div>
                                    </td>
                                </tr>
                        </table>

                    </div>



        <div class="chat border border-dark rounded bg-light position-relative">
            <div class="container m-0 p-0 w-100">
                <div class="bg-secondary col-12">
                    <div class="h-100">
                        <h2 class="w-100 m-0 text-white font-weight-bold">Sala de Chat
                            <button type="button" id="max" class="btn btn-info float-right text-white font-weight-bold bg-danger" data-toggle="collapse" data-target="#abrir">+</button>
                        </h2>
                    </div>
                </div>

                <div id="abrir" class="collapse">
                    <div class="font-weight-bold border border-dark bg-warning">USUARIOS ONLINE</div>
                    <div class="scroll bg-primary text-white">
                        <div class="ml-2">Luis Miguel García</div>
                        <div class="ml-2">Miguel Angel Álvarez</div>
                        <div class="ml-2">Miguel Angel Pérez</div>
                        <div class="ml-2">Miguel Angel Sánchez</div>
                        <div class="ml-2">Miguel Angel Rodríguez</div>
                    </div>
                    <div id="conversacion" class="font-weight-bold border border-dark bg-info">
                        <div class="font-weight-bold border bg-warning">MENSAJES</div>

                        <div class="scroll h-75">

                            <div class="text-danger">Luis Miguel García:&nbsp;<span class="text-black">Hola</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">Hola Luis</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>
                            <div class="text-danger">Miguel Angel Rodríguez:&nbsp;<span class="text-black">¿Alguna duda?</span></div>

                        </div>
                        <div><textarea cols="40" rows="1"></textarea></div>
                    </div>

                </div>
            </div>
        </div>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!--Script para abrir y cerrar el chat-->
            <script>
                $(document).ready(function(){
                    $('#max').click(function () {
                        if(document.getElementById('max').innerHTML == '-') {

                            $('#max').addClass('collapsed');
                            document.getElementById("max").innerHTML = "+";
                            $('#abrir').addClass('aria-expanded="false"');
                        }else {
                            $('#max').removeClass('collapsed');
                            document.getElementById("max").innerHTML = "-";
                            $('#abrir').addClass('aria-expanded="true"');
                        }

                    });
                });



            </script>
        </div>
    </div>

@endsection

