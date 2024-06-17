<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function comprar(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar una compra.');
        }

        $producto = Productos::findOrFail($id);
        $productos = Productos::all();

        $venta = new Venta;
        $venta->fkusuario = Auth::id();
        $venta->fkproducto = $producto->id;
        $venta->cantidad = $request->input('cantidad');
        $venta->fecha = now();
        $venta->save();

        return view('tienda', compact('productos'));
        //return redirect()->route('tienda')->with('success', 'Compra realizada con éxito.');
    }
}

