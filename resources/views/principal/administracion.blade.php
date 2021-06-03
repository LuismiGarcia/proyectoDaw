@extends("layout");
@section("contenido")
    <div class="bg-image fondo_fijo" style=" background-image: url('{{asset('images/administracion.webp')}}');">
        <div class="site-section border-2 mask-custom3">
            <div class="container  mt-5 ml-5 w-75 opacity-3" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-justify p-3">
                        <div class="site-section-title">
                            <h1 class="text-black font-weight-bold p-3 bg-light opacity-5">Cursos de Administración-Finanzas</h1>

                        </div>
                        <h3 class="text-white p-1 font-weight-bold bg-primary opacity-5 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</h3>
                    </div>

                </div>
            </div>

            <section class="section row justify-content-center section--code">
                <div class="container w-100 mt-3">
                    <h1 class="text-center  text-white font-weight-bold">ELIGE TU CURSO DE ADMINISTRACIÓN Y FINANZAS</h1>
                    <div class="d-flex movil2 h-50 mt-5">
                        <div class="w-100 movil display-pc ml-5  mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/administracion/RRHH.jpg')}}" alt="Card image cap">
                            <div class="bg-secondary h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Recursos Humanos</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/administracion/cont_financiera.jpg')}}" alt="Card image cap">
                            <div class="bg-secondary h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Contabilidad Financiera</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary float-lg-right">Entra</a>
                            </div>

                        </div>
                        <div class="w-100 movil display-pc mr-5 card" data-aos="fade-up">

                            <img class="card-img-top h-50 img-fluid" src="{{asset('images/administracion/impuestos.jpg')}}" alt="Card image cap">
                            <div class="bg-secondary h-50 mt-0 card-body">
                                <h5 class="card-title font-weight-bold">Impuestos</h5>
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
