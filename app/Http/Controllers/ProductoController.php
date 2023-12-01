<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index(){
        return view('productos');
    }

    public function finalizar(){
        $categorias = Categoria::all();
        
        return view('finalizarCompra');
    }

    public function buscarProducto($idProducto){
        return Producto::find($idProducto);
    }

    public function productos(){
        return Producto::all();
    }
}
