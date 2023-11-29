@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

    <form action="/categorias/{{$categoria->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$categoria->name}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="description" name="description" type="text" class="form-control" value="{{$categoria->description}}">
        </div>
        <a href="/categorias" class="btn btn-secondary" tabindex="4">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Actualizar</button>

    </form>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')

@stop