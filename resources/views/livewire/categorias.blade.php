<div>
    {{-- The whole world belongs to you. --}}

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categorias->id}}</td>
                <td>{{$categorias->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
