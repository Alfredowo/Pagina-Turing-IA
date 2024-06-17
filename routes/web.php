<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductosController::class, 'show'])->name('productos.edit');
Route::patch('/productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

//categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::patch('/categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

//usuarios
Route::resource('users', UsuarioController::class);

//ventas
Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');

//compra
Route::post('comprar/{id}', [CompraController::class, 'comprar'])->name('comprar')->middleware('auth');

//login
Route::view('/login', "login")->name('login');
Route::view('/registro', "registro")->name('registro');
Route::view('/registroAdmin', "registroAdmin")->name('registroAdmin');
Route::view('/tienda', "tienda")->middleware('auth')->name('tienda');
Route::view('/admin', "admin")->middleware('auth')->name('admin');

Route::post('/validar-registro', [LoginController::class, 'register'])->
    name('validar-registro');
Route::post('/validar-registro-admin', [LoginController::class, 'registerAdmin'])->
    name('validar-registro-admin');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->
    name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
