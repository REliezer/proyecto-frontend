<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoriaController extends Controller
{
    //
    public function index($idCategoria){
        $categoriasVisitada = Categoria::find($idCategoria);
        $subcategorias = Subcategoria::where('idCategoria', $idCategoria)->get();
        $productos = DB::table('productos')
        ->join('subcategorias', 'productos.idSubcategoria', '=', 'subcategorias.idSubcategoria')
        ->join('categorias', 'subcategorias.idCategoria', '=', 'categorias.idCategoria')
        ->where('categorias.idCategoria', '=', $idCategoria)
        ->select('productos.*')
        ->paginate(8);


        return view('subcategorias', compact('categoriasVisitada', 'subcategorias', 'productos'));
    }

    public function productosSubcategoria($idCategoria, $idSubcategoria){
        $subcategorias = Subcategoria::where('idCategoria', $idCategoria)->get();
        $productos = Producto::where('idSubcategoria', $idSubcategoria)->paginate(8);
        $categoriasVisitada = Categoria::find($idCategoria);

        return view('subcategorias', compact('productos', 'subcategorias', 'categoriasVisitada'));
    }
}
