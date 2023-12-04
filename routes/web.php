<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');

Route::get('obtenerCategorias', [CategoriaController::class, 'categorias'])->name('categorias.categorias');



Route::get('subcategorias/{descripcion}', [SubcategoriaController::class, 'index'])->name('subcategorias.index');


Route::get('subcategorias/productos/{nombreCategoria}/{nombreSubcategoria}',
            [SubcategoriaController::class, 'productosSubcategoria'])->name('subcategorias.productos');


Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');

Route::get('finalizar', [ProductoController::class, 'finalizar'])->name('productos.finalizar');

Route::get('productos/buscar/{idProducto}', [ProductoController::class,
            'buscarProducto'])->name('productos.buscarProducto');

Route::get('productos/all', [ProductoController::class, 'productos'])->name('productos.all');

//crear venta
Route::POST('ventas/finalizar', [VentaController::class, 'finalizar'])->name('ventas.finalizar');
