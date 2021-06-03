@extends("layout");
@section("contenido")
    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('images/informatica.jpg')}}');">
        <div class="site-section border-2 mask-custom">
            <div class="container  mt-5 ml-5 w-75 opacity-3" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-justify p-3">
                        <div class="site-section-title">
                            <h1 class="text-black font-weight-bold p-3 bg-light opacity-5">Cursos de Informática</h1>

                        </div>
                        <h3 class="text-white p-1 font-weight-bold bg-primary opacity-5 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</h3>
                    </div>

                </div>
            </div>

            <section class="section mb-5 row justify-content-center section--code">
                <div class="container  w-100 mt-3">
                    <div><h1 class="text-center text-white font-weight-bold">ELIGE TU CURSO DE INFORMÁTICA</h1></div>
                    <div class="d-flex  movil2 h-50 mt-5">
                        <div class="w-100 movil display-pc ml-5 mr-5 card"  data-aos="fade-up" data-aos-delay="250">

                                <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/java.jpg')}}" alt="java">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Interfaces para JAVA con Swing</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=1" class="btn btn-primary float-lg-right mb-5">Entra</a>
                            </div>
                        </div>

                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up" data-aos-delay="250">

                                <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/sql.png')}}" alt="sql">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">SQL</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=2" class="btn btn-primary float-lg-right mb-5">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up" data-aos-delay="250">

                                <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/bootstrap.png')}}" alt="bootstrap">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Bootstrap</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=3" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex movil2  mt-5">
                        <div class="w-100 movil display-pc ml-5 mr-5 card " data-aos="fade-up">

                                <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/php.png')}}" alt="php">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Ficheros en PHP</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=4" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/laravel.jpeg')}}" alt="laravel">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Laravel</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=5" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                                <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/symphony.jpg')}}" alt="symphony">

                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Symphony</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=6" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex movil2 mt-5">
                        <div class="w-100  movil display-pc ml-5 mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/css3.png')}}" alt="css3">
                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">CSS3</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=7" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/html5.jpg')}}" alt="html5">
                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">HTML5</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=8" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/informatica/apache.jpg')}}" alt="apache">
                            <div class="bg-success h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Apache Server</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="/cursoslosenlaces/informatica/id=9" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>

@endsection
