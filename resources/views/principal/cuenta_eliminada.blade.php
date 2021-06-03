@extends("layout");
@section("contenido")

    <div class="bg-image fondo_fijo " style=" background-image: url('images/informatica.jpg');">
        <div class="site-section border-2 mask-custom">
            <div class="container  mt-5 ml-5 w-75 opacity-3" data-aos="fade-right">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-justify p-3">
                        <div class="site-section-title">
                            <h1 class="text-danger font-weight-bold p-3 bg-light opacity-5">{{$msg}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
