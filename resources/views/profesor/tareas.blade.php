@extends("layout");
@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('images/miscursos.jpg');">
        <div class="site-section border-2 mask-custom">
            <div class="container  mt-5 ml-5 w-100 opacity-4" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-justify p-3">

                        <table class="m-3 border-white table-bordered table-hover bg-secondary">
                            <thead>
                                    <tr>
                                        <th class="p-2 text-center text-white">Tarea</th>
                                        <th class="p-2 text-center text-white">Nombre</th>
                                        <th class="p-2 text-center text-white">Primer apellido</th>
                                        <th class="p-2 text-center text-white">Segundo apellido</th>
                                        <th class="p-2 text-center text-white">Nombre Fichero</th>
                                        <th colspan="2" class="p-2 text-center text-white">Acciones</th>
                                    </tr>
                            </thead>
                            <tbody>


                                    <tr>
                                        <td class="p-2 text-center text-primary font-weight-bold">{{$titulo_tarea}}</td>
                                        <td class="p-2 text-center text-primary font-weight-bold">{{$nombre_alumno}}</td>
                                        <td class="p-2 text-center text-primary font-weight-bold">{{$apellido1_alumno}}</td>
                                        <td class="p-2 text-center text-primary font-weight-bold">{{$apellido2_alumno}}</td>
                                        <td class="p-2 text-center text-primary font-weight-bold">{{$nombre_tarea}}</td>
                                        <td class="p-2 text-center text-primary font-weight-bold">
                                            <form class="mt-3" method="get" action="{{route('ver_tarea_pdf')}}">
                                                @csrf
                                                <input type="hidden" name="nombre_tarea" value="{{$nombre_tarea}}">
                                                <input type="hidden" name="id_unidad" value="{{$id_unidad}}">
                                                <input type="hidden" name="id_curso" value="{{$id_curso}}">
                                                <input type="hidden" name="id_alumno" value="{{$id_alumno_tareas}}">
                                                <input type="hidden" name="titulo_tarea" value="{{$titulo_tarea}}">

                                                <input class="btn btn-success font-weight-bold" type="submit" value="Ver">
                                            </form>
                                        </td>

                                        <td class="p-2 text-center text-primary font-weight-bold">
                                            <form class="mt-3" method="get" action="{{url("descargar_tarea_pdf")}}">
                                                <input type="hidden" name="nombre_tarea" value="{{$nombre_tarea}}">
                                                <input type="hidden" name="id_unidad" value="{{$id_unidad}}">
                                                <input type="hidden" name="id_curso" value="{{$id_curso}}">
                                                <input type="hidden" name="id_alumno" value="{{$id_alumno_tareas}}">
                                                <input type="hidden" name="titulo_tarea" value="{{$titulo_tarea}}">
                                                <input class="btn btn-danger font-weight-bold" type="submit" value="Descargar">
                                            </form>

                                    </tr>
                            </tbody>


                        </table>





                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
