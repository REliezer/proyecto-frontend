<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SubcategoriaController;
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

Route::get('subcategorias', [SubcategoriaController::class, 'index'])->name('subcategorias.index');

Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
