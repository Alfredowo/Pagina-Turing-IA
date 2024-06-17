<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:2',
            'precio' => 'required|numeric',
            'descripcion' => 'required|min:5'
        ]);

        $producto = new Productos;
        $producto->nombre = $request->nombre;
        $producto->fkcategoria = $request->fkcategoria;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto creado correctamente');
    }

    public function index(){
        $productos = Productos::all();
        $categorias = Categorias::all();
        return view('productos.index', ['productos' => $productos, 'categorias' => $categorias]);
    }

    public function show($id){
        $producto = Productos::find($id);
        return view('productos.show', ['producto' => $producto]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|min:2',
            'precio' => 'required|numeric',
            'descripcion' => 'required|min:5'
        ]);

        $producto = Productos::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id){
        $producto = Productos::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos')->with('success', 'Producto eliminado correctamente');
    }
}
