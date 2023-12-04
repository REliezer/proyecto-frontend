<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductosAdminController extends Controller
{
    //
    public function productos($idCategory, $productos, $idSubCategory) {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            
        ]);

        $idCategoria = $idCategory;
        $idSubCategoria = $idSubCategory;

        $response = $client->request('GET', '/auth/products/obtener/subCategoria', ['query' => ['subCategory' => $productos]]);
        
        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $arr_body = json_decode($body);

            return view('productosAdmin', compact('arr_body', 'productos', 'idSubCategoria', 'idCategoria'));
        }
    }

    public function crearProducto($idCategory, $idSubCategory) {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            
        ]);

        $idCategoria = $idCategory;
        $idSubCategoria = $idSubCategory;

        $response = $client->request('GET', '/auth/subCategories/obtener', ['query' => []]);

        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $arr_body = json_decode($body);

            return view('crearProducto', compact('arr_body', 'idCategoria', 'idSubCategoria'));
        }
    }

    public function guardarProducto(Request $request, $idSubCategory, $idCategory) {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ['grod', '1234'],
        ]);

        $idCategoria = $idCategory;
        $idSubCategoria = $idSubCategory;

        $jsonData = json_encode([
            'serialCode' => $request->input("codigoSerie"),
            'name' => $request->input("nombre"),
            'unityPrice' => $request->input("precioUnidad"),
            'publicationDate' => $request->input("fechaPublicacion"),
            'description' => $request->input("descripcion"),
            'picture' => $request->input("imagen"),
            'reviews' => $request->input("resenas"),
        ]);

        $response = $client->request('POST', '/auth/products/crear', [
            'query' => [
                'idSubCategory' => $idSubCategory,
                'idCategory' => $idCategory,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonData, 'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonData,
        ]);

        return redirect(route('admin.categorias'));
    }
}