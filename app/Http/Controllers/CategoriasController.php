<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * index mostrar todos 
     * store guardar 
     * update actualizar
     * destroy eliminar
     * edit mostrar el formulario de edicion
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all();

        return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias|max:255'
        ]);

        $categoria = new Categorias;
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria creada correctamente');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categorias::find($id);
        return view('categorias.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $categoria)
    {
        $categoria = Categorias::findOrFail($categoria);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias')->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $categoria)
    {
        $categoria = Categorias::findOrFail($categoria);
        $categoria->productos()->each(function($producto){
            $producto->delete();
        });
        $categoria->delete();

        return redirect()->route('categorias')->with('success', 'Categoria eliminada correctamente');
    }
}
