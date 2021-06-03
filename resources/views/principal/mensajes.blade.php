@extends("layout")
@section("contenido")

    <div class="bg-image fondo_fijo " style=" background-image: url('/images/miscursos.jpg');">
        <div class="site-section contenido border-2">
            <div class="container m-auto pt-5 w-50 opacity-4" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-sm-12 text-justify p-2">
                        <div class="site-section-title">
                            <h1 class="text-black font-weight-bold p-3 bg-light opacity-5 text-center">Mensajes</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-0 pb-5">
            <table class="border border-danger bg-secondary table-hover m-auto w-75">
                <thead class="border bg-warning text-center font-weight-bold">
                <tr class="border-danger">
                    <th class="border border-dark">Usuario</th>
                    <th class="border border-dark">Asunto</th>
                    <th class="border border-dark">Mensajes totales</th>
                    <th class="border border-dark">Fecha</th>
                    <th class="border border-dark" colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="align-middle text-center text-white">Juan Pérez García</td>
                    <td class="align-middle text-center text-white">Inicio curso</td>
                    <td class="align-middle text-center text-white">2</td>
                    <td class="align-middle text-center text-white">30/04/2022</td>
                    <td class="align-middle text-center text-white"><a class="btn btn-success font-weight-bold" href="#">Leer</a></td>
                    <td class="align-middle text-center text-white"><a class="btn btn-danger font-weight-bold" href="#">Eliminar conversación</a></td>
                </tr>
                <tr>
                    <td class="align-middle text-center text-white">Rubén García López</td>
                    <td class="align-middle text-center text-white">Bootstrap</td>
                    <td class="align-middle text-center text-white">10</td>
                    <td class="align-middle text-center text-white">04/05/2022</td>
                    <td class="align-middle text-center text-white"><a class="btn btn-success font-weight-bold" href="#">Leer</a></td>
                    <td class="align-middle text-center text-white"><a class="btn btn-danger font-weight-bold" href="#">Eliminar conversación</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


@endsection
