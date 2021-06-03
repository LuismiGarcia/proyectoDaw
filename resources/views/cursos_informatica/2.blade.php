@extends("layout");
@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('images/informatica.jpg')}}');">
        <div class="site-section border-2 mask-custom">
            <div class="container" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="text-justify p-3 mt-3 w-75">
                        <div class="site-section-title ">
                            <h1 class="text-black text-center font-weight-bold p-3 bg-light opacity-5 ">Curso de SQL</h1>

                        </div>
                    </div>

                </div>
            </div>

            <section class="section mb-5 mt-5 row justify-content-center section--code col-lg-12">
                <div class="d-flex">
                    <div class="w-50 border-dark rounded border-width ml-5 col-5 bg-success ">
                        <h1 class="text-center font-weight-bold text-primary">CONTENIDOS</h1>
                        <h3 class="mt-4"><ol>
                                <li>Bases de datos relacionales</li>
                                <li>Consultas I (SQL SELECT FROM WHERE)</li>
                                <li>Consultas II (SQL SELECT FROM WHERE)</li>
                                <li>Tipos de dato</li>
                                <li>Operadores (SQL WHERE)</li>
                                <li>Totalizar datos / Alias de campos (SQL AS)</li>
                                <li>Agrupación de datos (SQL GROUP BY)</li>
                                <li>Filtrar cálculos de totalización (SQL HAVING)</li>
                                <li>Ordenación del resultado (SQL ORDER BY)</li>
                                <li>El operador LIKE / El valor NULL</li>
                                <li>El producto cartesiano (SQL FROM)</li>
                                <li>Consultas III (SQL SELECT FROM WHERE)</li>
                                <li>Relaciones, claves primarias y foráneas</li>
                                <li>Reunión interna y externa (INNER / OUTER JOIN)</li>
                                <li>El modelo entidad-relación</li>
                                <li>Funciones</li>
                                <li>INSERT, UPDATE, DELETE SQL</li>

                            </ol>
                        </h3>

                    </div>
                    <div class="w-50 mt-3 ml-5 col-7">
                        <div class="p-5 text-dark">
                            <h1>NIVEL: <span class="text-danger">Grado Superior</span></h1>
                            <h1>TIPO: <span class="text-success">Repaso</span></h1>
                        </div>
                        <div class="col text-center pb-4">
                            <!--Si el usuario tiene el rol de alumno, el botón de inscribirse aparece y al pulsarlo lo reenvía a la página de todos cursos-->
                            <!--Si no ha iniado sesión al pulsar en inscribirse lo lleva al login-->
                            @auth()
                                @if(auth()->user()->id_role == 3)
                                    <div data-aos="fade-down" data-aos-delay="550">
                                        <form action="{{url('/miscursos')}}" method="get">

                                            <input type="hidden" name="id" value='{{auth()->user()->id}}'>
                                            <input type="hidden" name="id_curso" value='{{$id_curso}}'>
                                            <button class="text-white btn btn-warning text-dark font-weight-bold">INSCRIBIRSE</button>
                                        </form>

                                    </div>
                                @endif

                            @endauth
                            @guest()
                                <a href="/login" class="btn btn-danger">INSCRIBIRSE</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
