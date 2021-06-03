@extends("layout")
@section("contenido")

    <div class="bg-image fondo_fijo " style=" background-image: url('{{asset('/images/miscursos.jpg')}}');">
        <div class="site-section border-2">
            <div class="unidades container mt-3  ml-3 col-7 opacity-4" data-aos="fade-up">
                <div class="row justify-content-center ">
                    <div class="mt-5 col-lg-12">
                        <fieldset class="text-white font-weight-bold">Configuración de tu cuenta</fieldset>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('success') }}</li>
                                </ul>
                            </div>
                        @endif
                        @if($errors->count() >0)
                            @foreach($errors->all() as $error)
                                <h4 class="text-danger font-weight-bold mt-2">Error. {{$error}}</h4>
                            @endforeach
                        @endif
                        <form action="{{route('editar')}}" method="post" class="border border-white p-5 ">
                            @csrf
                            @method("PUT")

                            <div class="mb-3">
                                <label for="email" class="form-label text-white font-weight-bold">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label text-white font-weight-bold">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña">
                            </div>
                            <div class="mb-3">
                                <label for="rep_contraseña" class="form-label text-white font-weight-bold">Repite Contraseña</label>
                                <input type="password" class="form-control" id="rep_contraseña" name="rep_contraseña">
                            </div>
                            <div class="mb-3">

                                <input type="submit" class="btn btn-success text-dark font-weight-bold" value="Modificar">
                            </div>
                        </form>
                        <form>
                                @auth()
                                    @if(auth()->user()->id_role == 3)
                                <a class="btn btn-danger text-white font-weight-bold" href="{{route('eliminar_cuenta_alumno')}}">Eliminar cuenta</a>
                                    @endif
                                @endauth
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div id="mensajes">
            <a class="btn btn-secondary text-dark font-weight-bold border-danger" href="{{route('mensajes')}}">Ver Mensajes</a>
        </div>
    </div>
@endsection
