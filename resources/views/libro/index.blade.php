@extends('adminlte::page')

@section('title', 'Libros')

@section('content_header')
    <h1>Listado de Libros</h1>
@stop

@section('content')
    <a href="libros/create" class="btn btn-primary mb-3">CREAR</a>

    <table id="libros" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Año Publicación</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td>{{$libro->id}}</td>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->ano_publicacion}}</td>
                <td>{{ $libro->categoria ? $libro->categoria->name : 'Sin categoría' }}</td>

                <td>
                    <form class="eliminar-form" action="{{ route ('libros.destroy', $libro->id)}}" method="POST">
                        <a href="/libros/{{$libro->id}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script>

function manejarFormulario(formulario, callback) {
    $(document).ready(function () {
        $(formulario).off('submit').on('submit', function (event) {
            event.preventDefault();
            var form = $(this);

            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, bórralo!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Formulario:", form.serialize());
                    $.ajax({
                        type: form.attr("method"),
                        url: form.attr("action"),
                        data: form.serialize(),
                        success: function (data) {
                            if (callback && typeof callback === 'function') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Su archivo ha sido eliminado.",
                                    icon: "success"
                                }).then(function () {
                                    // Recargar la página después de hacer clic en "OK" en la alerta
                                    window.location.reload();
                                    callback(data);
                                });
                            }
                        },
                        error: function (data) {
                            console.log("Error en la solicitud AJAX");
                        }
                    });
                }
            });
        });
    });
}

manejarFormulario(".eliminar-form", function (data) {
    console.log(data);
    // Puedes realizar otras acciones después de eliminar el archivo
});

</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    new DataTable('#libros',{
        "lengthMenu": [[5,10,50,-1], [5,10,50,"ALL"]]
    });
</script>
@stop