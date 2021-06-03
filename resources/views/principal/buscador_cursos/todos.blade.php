@extends("layout")
@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('/images/miscursos.jpg')}}');">
        <div class="site-section border-2">
            <div class="unidades container mt-3  ml-3 col-7 opacity-4" data-aos="fade-up">
                <h1 class="mt-5 text-white">TODOS LOS CURSOS DISPONIBLES</h1>
                <div class="row">
                    <div class="mt-5 col-lg-12 ">
                        <div class="table-responsive">

                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                <thead>
                                <tr class="table table-hover table-warning text-dark">

                                    <th>Nombre del curso</th>
                                    <th>Página del curso</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($todos_cursos as $curso)
                                        <tr>
                                        @if($curso->id_tipo == 1 or $curso->id_tipo == 2)
                                            <td>{{$curso->nombre}}</td>
                                                <td><form action="{{url("informatica/id={$curso->id}")}}">
                                                        <button class="text-white btn btn-success btn-outline-success text-danger font-weight-bold">Ir al curso</button>
                                                    </form>
                                                </td>
                                        @elseif($curso->id_tipo == 3 or $curso->id_tipo == 4)
                                                <td>{{$curso->nombre}}</td>
                                                <td><form action="{{url("administracion/id={$curso->id}")}}">
                                                        <button class="text-white btn btn-success btn-outline-success text-danger font-weight-bold">Ir al curso</button>
                                                    </form>
                                                </td>


                                        @elseif($curso->id_tipo == 5 or $curso->id_tipo == 6)
                                                <td>{{$curso->nombre}}</td>
                                                <td><form action="{{url("marketing/id={$curso->id}")}}">
                                                        <button class="text-white btn btn-success btn-outline-success text-danger font-weight-bold">Ir al curso</button>
                                                    </form>
                                                </td>

                                        @elseif($curso->id_tipo == 7 or $curso->id_tipo == 8)
                                                <td>{{$curso->nombre}}</td>
                                                <td><form action="{{url("logistica/id={$curso->id}")}}">
                                                        <button class="text-white btn btn-success btn-outline-success text-danger font-weight-bold">Ir al curso</button>
                                                    </form>
                                                </td>

                                        @elseif($curso->id_tipo == 9 or $curso->id_tipo == 10)
                                                <td>{{$curso->nombre}}</td>
                                                <td><form action="{{url("otros/id={$curso->id}")}}">
                                                        <button class="text-white btn btn-success btn-outline-success text-danger font-weight-bold">Ir al curso</button>
                                                    </form>
                                                </td>

                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

