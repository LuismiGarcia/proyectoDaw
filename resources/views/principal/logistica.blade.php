@extends("layout");
@section("contenido")

    <div class="bg-image fondo_fijo" style=" background-image: url('images/logistica.jpg');">
        <div class="site-section border-2 mask-custom">
            <div class="container  mt-5 ml-5 w-75 opacity-3" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-justify p-3">
                        <div class="site-section-title">
                            <h1 class="text-black font-weight-bold p-3 bg-light opacity-5">Cursos de Logística</h1>

                        </div>
                        <h3 class="text-white p-1 font-weight-bold bg-primary opacity-5 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</h3>
                    </div>

                </div>
            </div>

            <section class="section row justify-content-center section--code">
                <div class="container w-100 mt-3">
                    <div><h1 class="text-center text-white font-weight-bold">ELIGE TU CURSO DE LOGÍSTICA</h1></div>
                    <div class="d-flex movil2 h-50 mt-5">
                        <div class="w-100 movil display-pc ml-5 mr-5 card" data-aos="fade-up">

                                <img class="card-img-top h-50 img-fluid" src="images/logistica/gestion.png" alt="Card image cap">
                                <div class="bg-light h-50 mt-0 card-body">
                                    <h5 class="card-title font-weight-bold">Gestión logística</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary float-lg-right">Entra</a>
                                </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="images/logistica/g_transporte.jpg" alt="Card image cap">
                            <div class="bg-light h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Gestión del transporte</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="images/logistica/log_internac.jpg" alt="Card image cap">
                            <div class="bg-light h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Logística internacional</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                    </div>

                </div>

            </section>
        </div>
    </div>

@endsection
