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

// Rutas - Administrador - Creacion cliente
Route::post('clientes/crear/guardar', [ClienteController::class, 'guardarCliente'])->name('clientes.guardar');

Route::get('clientes/crear', [ClienteController::class, 'crearCliente'])->name('clientes.crear');

Route::get('clientes/editar', [ClienteController::class, 'actualizarCliente'])->name('clientes.actualizar');

Route::get('clientes/login', [ClienteController::class, 'login'])->name('clientes.login');

Route::get('admin', [CategoriasAdminController::class, 'categorias'])->name('admin.categorias');

Route::get('admin/subcategorias/{categoria}/{idCategory}', [SubCategoriasAdminController::class, 'subCategorias'])->name('admin.subCategorias');

Route::get('admin/subcategorias/productos/{idCategory}/{subCategory}/{idSubCategory}', [ProductosAdminController::class, 'productos'])->name('admin.productos');

Route::get('admin/crear/{idCategory}/{idSubCategory}', [ProductosAdminController::class, 'crearProducto'])->name('admin.crear');

Route::post('admin/crear/guardar/{idSubCategory}/{idCategory}', [ProductosAdminController::class, 'guardarProducto'])->name('admin.guardar');
//Fin Rutas - Administrador - Creacion cliente
