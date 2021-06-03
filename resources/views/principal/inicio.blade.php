<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <title>CursosLosEnlaces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class>

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span><i class="far fa-window-close js-menu-toggle"></i></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class="mb-0"><a href="{{route('home')}}" class="text-white h2 mb-0"><strong><span class="text-danger">Cursos</span>LosEnlaces</strong></a></h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                            <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                                <span><i class="far fa-caret-square-down"></i></span>
                            </a>
                        </div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="{{ (request()->is('inicio')) ? 'active bg-warning' : '' }}">
                                <a href="{{route('home')}}" class="text-white">Inicio</a>
                            </li>
                            @auth()
                                @if(auth()->user()->id_role == 2)
                                <li><a href="{{route('cursos_profesor')}}" class="text-white">Mis Cursos</a></li>
                                @else
                                <li><a href="{{route('cursos_alumno')}}" class="text-white">Mis Cursos</a></li>
                                @endif
                            @endauth
                            <li><a href="{{route('informatica')}}" class="text-white">Informática</a></li>
                            <li><a href="{{route('administracion')}}" class="text-white">Administración</a></li>
                            <li><a href="{{route('logistica')}}" class="text-white">Logística</a></li>
                            <li><a href="{{route('marketing')}}" class="text-white">Marketing</a></li>
                            <li class="has-children">
                                <span class="text-warning">Cursos Variados<i class="fas fa-chevron-down hove"></i></span>
                                <ul class="dropdown">
                                    <li><a href="#">FOL</a></li>
                                    <li><a href="#">Empresa e Iniciativa Emprendedora</a></li>
                                    <li><a href="{{route('matematicas')}}">Matemáticas</a></li>
                                    <li><a href="#">Química</a></li>
                                    <li><a href="#">Inglés</a></li>

                                </ul>
                            </li>
                            @auth()
                            <h1 class="text-white">Bienvenido/a {{auth()->user()->name}}</h1>
                            @endauth
                            @guest()
                            <li><a href="{{route('login')}}">Entrar</a></li>
                            <li><a href="{{route('register')}}">Registrar</a></li>
                            @else
                                <li>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                </li>
                                <li class="{{ (request()->is('micuenta')) ? 'active bg-warning' : '' }}"><a href="{{route('mi_cuenta')}}">Mi Cuenta</a></li>

                            @endguest

                            <form id="logout-form" action="{{ route('salir') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('images/main1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-success text-white px-3 mb-3 nivel_estudio rounded">Grado medio y Grado Superior</span>
                    <h1 class="mb-2">INFORMÁTICA</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Java Php Linux Docker</strong></p>
                    <p><a href="informatica" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('images/main2.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 nivel_estudio rounded">Grado Superior</span>
                    <h1 class="mb-2">ADMINISTRATIVO</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Contabilidad Nóminas Impuestos Finanzas</strong></p>
                    <p><a href="administracion" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('images/main3.jpg)}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 nivel_estudio rounded">Grado Superior</span>
                    <h1 class="mb-2">LOGÍSTICA</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Contenedores Costes Fiscalidad</strong></p>
                    <p><a href="logistica" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url({{asset('images/main4.jpg))}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 nivel_estudio rounded">Grado Superior</span>
                    <h1 class="mb-2">MARKETING</h1>
                    <p class="mb-5"><strong class="h2 text-warning font-weight-bold">Digital Operativo Análisis DAFO</strong></p>
                    <p><a href="marketing" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="site-section site-section-sm pb-0 bg-secondary">
    <div class="container">
        <div class="row">
            <form class="form-search col-md-12" action="{{route('buscar')}}" method="post" style="margin-top: -100px;">
                @csrf

                <div class="row  align-items-end">
                    <div class="col-md-3">
                        <label for="familia">Familia Profesional</label>
                        <div class="select-wrap">
                            <select name="familia" id="familia" class="form-control d-block rounded-0 fas">

                            @foreach($familias as $familia)

                                @if($contador == 1)
                                <option class="fas" value="{{$familia->familia}}">{{$familia->familia}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                    {{$contador ++}};
                                    @else
                                <option class="fas" value="{{$familia->familia}}">{{$familia->familia}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="nivel">Nivel</label>
                        <div class="select-wrap">

                            <select name="nivel" id="nivel" class="form-control d-block rounded-0 fas">
                                {{$contador = 1}}
                                @foreach($niveles as $nivel)

                                    @if($contador == 1)
                                        <option class="fas" value="{{$nivel->nombre}}">{{$nivel->nombre}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                        {{$contador ++}};
                                    @else
                                        <option class="fas" value="{{$nivel->nombre}}">{{$nivel->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="tipo">Tipo</label>
                        <div class="select-wrap">
                            <select name="tipo" id="tipo" class="form-control d-block rounded-0 fas">
                                {{$contador = 1}}
                                @foreach($tipos as $tipo)

                                    @if($contador == 1)
                                        <option class="fas" value="{{$tipo->nombre}}">{{$tipo->nombre}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                        {{$contador ++}};
                                    @else
                                        <option class="fas" value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success text-white btn-block rounded-0">Buscar</button>
                    </div>
                </div>

            </form>
        </div>

                @if(!isset($cursos))
                    {{$cursos = ""}}
                @else
            <div>
                <table id=tabla class="table table-hover table-dark text-center text-white font-weight-bold table-bordered">
                    <thead>
                    <tr class="table table-hover table-danger text-center text-dark font-weight-bold table-bordered">

                        <th>Nombre del curso</th>
                        <th>Página del curso</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->nombre}}</td>

                            <td>
                                <div>
                                    <form action="{{url("{$fam->familia->familia}/id={$curso->id}")}}">
                                        <button class="text-white btn btn-warning text-dark font-weight-bold">Ir al curso</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                @endif


                </tbody>

            </table>
        </div>

            <div class="row bg-danger" id="anchura">
                <div class="col-md-12">
                    <div class="view-options py-3  d-md-flex align-items-center">
                        <div class="ml-auto d-flex align-items-center">
                            <div>
                                <a href="{{route('todos_cursos')}}" class="view-list px-3 border-right active text-white font-weight-bold">Todos</a>
                                <a href="#" class="view-list px-3 border-right text-white font-weight-bold">Grado Superior</a>
                                <a href="#" class="view-list px-3 text-white font-weight-bold">Grado Medio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-5">
                    <h3 class="footer-heading mb-4">Sobre Nosotros</h3>
                    <p id="pie">Somos un centro público que a parte de impartir enseñanda presencial imparte cursos online para estudiantes y titulados de todas nuestras familias profesionales presentes en el centro. Hay cursos de todos niveles y de repaso o ampliación</p>
                </div>



            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Navegación</h3>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="inicio">Inicio</a></li>
                            <li><a href="informatica">Informática</a></li>
                            <li><a href="administracion">Administración</a></li>
                            <li><a href="logistica">Logística</a></li>
                            <li><a href="marketing">Marketing</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Síguenos</h3>

                <div>
                    <a href="#" class="pl-3 pr-3"><span><i class="fab fa-facebook-square"></i></span></a>
                    <a href="#" class="pl-3 pr-3"><span><i class="fab fa-twitter-square"></i></span></a>
                    <a href="#" class="pl-3 pr-3"><span><i class="fab fa-linkedin"></i></span></a>
                    <a href="#" class="pl-3 pr-3"><span><i class="fab fa-youtube"></i></span></a>
                </div>



            </div>

        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Esta página fue hecha por Luismi García
                </p>
            </div>

        </div>
    </div>
</footer>



<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
