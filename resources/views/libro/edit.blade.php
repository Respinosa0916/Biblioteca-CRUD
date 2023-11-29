@extends('adminlte::page')

@section('title', 'Libro')

@section('content_header')
    <h1>Editar Libro</h1>
@stop

@section('content')

    <form action="/libros/{{$libro->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input id="titulo" name="titulo" type="text" class="form-control" value="{{ $libro->titulo }}" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="ano_publicacion" class="form-label">Año de Publicación</label>
            <select id="ano_publicacion" name="ano_publicacion" class="form-control" tabindex="2">
                @php
                    $currentYear = date('Y');
                @endphp
                @for ($year = $currentYear; $year >= $currentYear - 1000; $year--)
                    <option value="{{ $year }}" {{ $libro->ano_publicacion == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select id="id_categoria" name="id_categoria" class="form-control" tabindex="3">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ optional($libro->categoria)->id == $categoria->id ? 'selected' : '' }}>
    {{ $categoria->name }}
</option>

                @endforeach
            </select>
        </div>
        <a href="/libros" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>

    </form>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    
@stop
