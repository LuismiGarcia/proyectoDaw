<!DOCTYPE html>
<html lang="es">
<head>
    <title>CursosLosEnlaces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="css/style2.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >



    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

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
                    <h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0"><strong><span class="text-danger">Cursos</span>LosEnlaces</strong></a></h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span><i class="far fa-caret-square-down"></i></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active">
                                <a href="inicio">Inicio</a>
                            </li>
                            @auth()
                                <li><a href="miscursos" class="text-white">Mis Cursos</a></li>
                            @endauth
                            <li><a href="informatica">Informática</a></li>
                            <li><a href="administracion">Administración</a></li>
                            <li><a href="logistica">Logística</a></li>
                            <li><a href="marketing">Marketing</a></li>
                            <li class="has-children">
                                <span class="text-warning">Cursos Variados<i class="fas fa-chevron-down hove"></i></span>
                                <ul class="dropdown">
                                    <li><a href="#">FOL</a></li>
                                    <li><a href="#">Empresa e Iniciativa Emprendedora</a></li>
                                    <li><a href="matematicas">Matemáticas</a></li>
                                    <li><a href="#">Química</a></li>
                                    <li><a href="#">Inglés</a></li>

                                </ul>
                            </li>
                            @auth()
                            <h1 class="text-white">Bienvenido/a {{auth()->user()->name}}</h1>
                            @endauth
                            @guest()
                            <li><a href="login">Entrar</a></li>
                            <li><a href="register">Registrar</a></li>
                            @else
                                <li>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                </li>
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


<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover overlay" style="background-image: url(images/main1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">Grado medio y Grado Superior</span>
                    <h1 class="mb-2">INFORMÁTICA</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Java Php Linux Docker</strong></p>
                    <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url(images/main2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">Grado Superior</span>
                    <h1 class="mb-2">ADMINISTRATIVO</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Contabilidad Nóminas Impuestos Finanzas</strong></p>
                    <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url(images/main3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">Grado Superior</span>
                    <h1 class="mb-2">LOGÍSTICA</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">Contenedores Costes Fiscalidad</strong></p>
                    <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url(images/main4.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">Grado Superior</span>
                    <h1 class="mb-2">MARKETING</h1>
                    <p class="mb-5"><strong class="h2 text-warning font-weight-bold">Digital Operativo Análisis DAFO</strong></p>
                    <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Cursos</a></p>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="site-section site-section-sm pb-0">
    <div class="container">
        <div class="row">
            <form class="form-search col-md-12" style="margin-top: -100px;">
                <div class="row  align-items-end">
                    <div class="col-md-3">
                        <label for="list-types">Familia Profesional</label>
                        <div class="select-wrap">

                            <select name="list-types" id="list-types" class="form-control d-block rounded-0 fas">

                                <option class="fas" value="">Informática &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                <option value="">Administrativo</option>
                                <option value="">Logística</option>
                                <option value="">Marketing</option>
                                <option value="">Otros</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="offer-types">Nivel</label>
                        <div class="select-wrap">

                            <select name="offer-types" id="offer-types" class="form-control d-block rounded-0 fas">
                                <option  class="fas" value="">Grado Medio &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                <option value="">Grado Superior</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="select-city">Tipo</label>
                        <div class="select-wrap">
                            <select name="select-city" id="select-city" class="form-control d-block rounded-0 fas">
                                <option  class="fas" value="">Ampliación &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&#xf107</option>
                                <option value="">Repaso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

        <div class="row bg-danger" >
            <div class="col-md-12">
                <div class="view-options py-3 px-3 d-md-flex align-items-center">

                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="#" class="view-list px-3 border-right active text-white font-weight-bold">Todos</a>
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
                            <li><a href="home">Inicio</a></li>
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

</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>

</body>
</html>
