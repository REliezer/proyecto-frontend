<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function index(){
        return view('categorias');
    }

    public function categorias(){
        return Categoria::all();
    }
}
