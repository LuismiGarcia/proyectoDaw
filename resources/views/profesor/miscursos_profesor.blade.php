@extends("layout");
@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('images/miscursos.jpg')}}');">
        <div class="site-section border-2 mask-custom">
            <div class="container  mt-5 ml-5 w-100 opacity-4" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-justify p-3">
                        <div class="site-section-title">
                            <h1 class="text-black font-weight-bold p-3 bg-light opacity-5">Hola Profesor</h1>
                            <ul class="tabs">
                                <li><a href="#tab1" class="bg-success text-white font-weight-bold">Informática</a></li>
                                <li><a href="#tab2" class="bg-warning text-white font-weight-bold">Administración</a></li>
                                <li><a href="#tab3" class="bg-primary text-white font-weight-bold">Logística</a></li>
                                <li><a href="#tab4" class="bg-danger text-white font-weight-bold">Marketing</a></li>
                            </ul>

                            <div class="tab_container">
                                <div class="tab_content" id="tab1">
                                    <h3>Cursos de informática donde eres el profesor</h3>

                                    <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                        <thead class="bg-warning text-black">
                                        <tr>
                                            <th>Curso</th>
                                            <th scope="col" colspan="2" class="text-center">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cursos as $curso)
                                            @if($curso->id_tipo == 1 || $curso->id_tipo == 2)
                                                <div hidden>{{$contador++}}</div>
                                                <tr>
                                                    <td>{{$curso->nombre}}</td>
                                                    <td>
                                                        <a href="/cursoslosenlaces/informatica/id={{$curso->id}}/entrarProfesor" class="btn btn-success">Entrar</a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                    @if($contador == 0)
                                        <h5>No estás inscrito en ningún curso todavía</h5>
                                    @endif

                                </div>
                                <div class="tab_content" id="tab2">
                                    <h3>Cursos de administración y finanzas donde eres el profesor </h3>

                                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                                <thead class="bg-warning text-black">
                                                <tr>
                                                    <th>Curso</th>
                                                    <th scope="col" colspan="2" class="text-center">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <div hidden>{{$contador = 0}}</div>
                                                @foreach($cursos as $curso)
                                                    @if($curso->id_tipo == 3 || $curso->id_tipo == 4)
                                                        <div hidden>{{$contador++}}</div>
                                                <tr>
                                                    <td>{{$curso->nombre}}</td>
                                                    <td>
                                                        <a href="/cursoslosenlaces/administracion/id={{$curso->id}}/entrarProfesor" class="btn btn-success">Entrar</a>
                                                    </td>

                                                </tr>
                                                    @endif
                                                @endforeach

                                                </tbody>
                                            </table>
                                    @if($contador == 0)
                                        <h5>No estás inscrito en ningún curso todavía</h5>
                                    @endif
                                </div>
                                <div class="tab_content" id="tab3">
                                    <h3>Cursos de logística donde eres el profesor </h3>

                                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                                <thead class="bg-warning text-black">
                                                <tr>
                                                    <th>Curso</th>
                                                    <th scope="col" colspan="2" class="text-center">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <div hidden>{{$contador = 0}}</div>
                                                @foreach($cursos as $curso)
                                                    @if($curso->id_tipo == 5 || $curso->id_tipo == 6)

                                                        <div hidden>{{$contador++}}</div>
                                                <tr>
                                                    <td>{{$curso->nombre}}</td>
                                                    <td>
                                                        <form action=href="/cursoslosenlaces/marketing/id={{$curso->id}}/entrarProfesor" method="post">
                                                            <input type="hidden" name="curso_id" value="{{$curso->id}}">
                                                            <div><a class="btn btn-success" type="submit">Entrar</a></div>
                                                        </form>
                                                    </td>

                                                </tr>
                                                    @endif
                                                @endforeach

                                                </tbody>
                                            </table>
                                    @if($contador == 0)
                                        <h5>No estás inscrito en ningún curso todavía</h5>
                                    @endif
                                </div>
                                <div class="tab_content" id="tab4">
                                    <h3>Cursos de marketing donde eres el profesor </h3>

                                            <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                                                <thead class="bg-warning text-black">
                                                <tr>
                                                    <th>Curso</th>
                                                    <th scope="col" colspan="2" class="text-center">Acciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <div hidden>{{$contador = 0}}</div>
                                                @foreach($cursos as $curso)
                                                    @if($curso->id_tipo == 7 || $curso->id_tipo == 8)
                                                        <div hidden>{{$contador++}}</div>
                                                <tr>
                                                    <td>{{$curso->nombre}}</td>
                                                    <td>
                                                        <a href="/cursoslosenlaces/logistica/id={{$curso->id}}/entrarProfesor" class="btn btn-success">Entrar</a>
                                                    </td>

                                                </tr>
                                                    @endif
                                                @endforeach

                                                </tbody>
                                            </table>
                                    @if($contador == 0)
                                        <h5>No estás inscrito en ningún curso todavía</h5>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
