<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view("libro.index")->with('libros',$libros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('libro.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libros = new Libro();
        $libros->titulo = $request->get('titulo');
        $libros->ano_publicacion = $request->get('ano_publicacion');
        $libros->id_categoria = $request->get('id_categoria');

        $libros->save();

        return redirect('/libros');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::find($id);
        $categorias = Categoria::all();
        return view("libro.edit", ['libro' => $libro, 'categorias' => $categorias])->with('libro',$libro);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::find($id);
        $libro->titulo = $request->get('titulo');
        $libro->ano_publicacion = $request->get('ano_publicacion');
        $libro->id_categoria = $request->get('id_categoria');

        $libro->save();

        return redirect('/libros');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::find($id);
        $libro->delete();

        return redirect('/libros');
    }
}
