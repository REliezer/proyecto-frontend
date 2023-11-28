<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoriaController extends Controller
{
    //
    public function index($idCategoria){
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::where('idCategoria', $idCategoria)->get();
        $productos = DB::table('productos')
        ->join('subcategorias', 'productos.idSubcategoria', '=', 'subcategorias.idSubcategoria')
        ->join('categorias', 'subcategorias.idCategoria', '=', 'categorias.idCategoria')
        ->where('categorias.idCategoria', '=', $idCategoria)
        ->select('productos.*')
        ->get();


        return view('subcategorias', compact('categorias','subcategorias', 'productos'));
    }
}
