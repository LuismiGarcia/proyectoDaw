<!DOCTYPE html>
<html lang="en">
<head>
    <title>CursosLosEnlaces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('images/icono.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/fl-bigmug-line.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >



    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body class="bg-dark">

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="js-menu-toggle"><i class="far fa-window-close"></i></span>
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

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span><i class="far fa-caret-square-down"></i></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active">
                                <a href="{{route('home')}}">Inicio</a>
                            </li>
                            @auth()
                                @if(auth()->user()->id_role == 2)
                                    <li><a href="{{route('cursos_profesor')}}" class="text-white">Mis Cursos</a></li>
                                @else
                                    <li><a href="{{route('cursos_alumno')}}" class="text-white">Mis Cursos</a></li>
                                @endif
                            @endauth
                            <li><a href="{{route('informatica')}}">Informática</a></li>
                            <li><a href="{{route('administracion')}}">Administracion</a></li>
                            <li><a href="{{route('logistica')}}">Logística</a></li>
                            <li><a href="{{route('marketing')}}">Marketing</a></li>
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

                            @guest()
                                <li><a href="{{route('login')}}">Entrar</a></li>
                                <li><a href="{{route('register')}}">Registrar</a></li>
                            @else
                                <li>
                                    <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                </li>
                                <li><a href="{{route('mi_cuenta')}}">Mi Cuenta</a></li>

                            @endguest

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="container">

                <img src="images/error-404.jpg" class="mx-auto d-block my-5 img-fluid" alt="imagen de página no encontrada">

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
                                    <li><a href="{{route('home')}}">Inicio</a></li>
                                    <li><a href="{{route('informatica')}}">Informática</a></li>
                                    <li><a href="{{route('administracion')}}">Administración</a></li>
                                    <li><a href="{{route('logistica')}}">Logística</a></li>
                                    <li><a href="{{route('marketing')}}">Marketing</a></li>
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
                            <a href="#" class="pl-3 pr-3"><span><i class="fab fa-twitter-square"></i></span></a>
                            <a href="#" class="pl-3 pr-3"><span><i class="fab fa-facebook-square"></i></span></a>
                            <a href="#" class="pl-3 pr-3"><span><i class="fab fa-linkedin"></i></span></a>
                            <a href="#" class="pl-3 pr-3"><span><i class="fab fa-youtube"></i></span></a>

                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
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



<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
