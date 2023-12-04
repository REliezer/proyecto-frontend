<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoriaController extends Controller
{
    //
    public function index($nombreCategoria){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            //'auth' => ['Gerardo', '1234'],
        ]);

        //Buscar los productos de la categoria
        $response1 = $client->request('GET', '/auth/products/obtener/categoria', [
            'query' => [
                'Category' => $nombreCategoria,
            ],
        ]);

        //Buscar las subcategorias de la categoria
        $response2 = $client->request('GET', '/auth/subCategories/obtener/subCategories/categories', [
            'query' => [
                'categoria' => $nombreCategoria,
            ],
        ]);

        if (($response1->getStatusCode() == 200) && $response2->getStatusCode() == 200) {
            // La solicitud fue exitosa
            $body1 = $response1->getBody();
            $body2 = $response2->getBody();

            $productos_body = json_decode($body1);
            $subcategorias_body = json_decode($body2);

            foreach ($subcategorias_body as $item) {
                // Verificar si el elemento es un objeto (stdClass)
                if (is_object($item)) {
                    foreach ($item as $key => $value) {
                        // Verificar si el valor es una cadena antes de aplicar htmlspecialchars
                        if (is_string($value)) {
                            // Aplicar htmlspecialchars al valor
                            $item->$key = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                        }
                    }
                }
            }

            //$productos_body es tu lista de productos
            $productos = $productos_body;

            // Paginación
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 8; // Número de elementos por página

            // Calcular el índice inicial y final de los elementos en la página actual
            $currentPageSearchResults = array_slice($productos, ($currentPage - 1) * $perPage, $perPage);

            // Crear una instancia de LengthAwarePaginator
            $productosPaginados = new LengthAwarePaginator(
                $currentPageSearchResults,
                count($productos), // Total de elementos
                $perPage, // Elementos por página
                $currentPage, // Página actual
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );

            return view('subcategorias', compact('nombreCategoria', 'subcategorias_body', 'productosPaginados'));
        } else {
            return view('error', ['message' => 'Error al hacer la solicitud API']);
        }
    }

    public function productosSubcategoria($nombreCategoria, $nombreSubcategoria){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            //'auth' => ['Gerardo', '1234'],
        ]);

        //productos de la subcategoria
        $response1 = $client->request('GET', '/auth/products/obtener/subCategoria', [
            'query' => [
                'subCategory' => $nombreSubcategoria,
            ],
        ]);

        //subcategorias de la categoria
        $response2 = $client->request('GET', '/auth/subCategories/obtener/subCategories/categories', [
            'query' => [
                'categoria' => $nombreCategoria,
            ],
        ]);

        //nombre de la subcategoria

        if (($response1->getStatusCode() == 200) && $response2->getStatusCode() == 200) {
            // La solicitud fue exitosa
            $body1 = $response1->getBody();
            $body2 = $response2->getBody();

            $productos_body = json_decode($body1);
            $subcategorias_body = json_decode($body2);

            foreach ($subcategorias_body as $item) {
                // Verificar si el elemento es un objeto (stdClass)
                if (is_object($item)) {
                    foreach ($item as $key => $value) {
                        // Verificar si el valor es una cadena antes de aplicar htmlspecialchars
                        if (is_string($value)) {
                            // Aplicar htmlspecialchars al valor
                            $item->$key = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                        }
                    }
                }
            }

            //$productos_body lista de productos
            $productos = $productos_body;

            // Paginación
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 8; // Número de elementos por página

            // Calcular el índice inicial y final de los elementos en la página actual
            $currentPageSearchResults = array_slice($productos, ($currentPage - 1) * $perPage, $perPage);

            // Crear una instancia de LengthAwarePaginator
            $productosPaginados = new LengthAwarePaginator(
                $currentPageSearchResults,
                count($productos), // Total de elementos
                $perPage, // Elementos por página
                $currentPage, // Página actual
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );

            return view('subcategorias', compact('productosPaginados', 'subcategorias_body', 'nombreCategoria'));
        } else {
            // Manejar el caso en que la solicitud no fue exitosa
            return view('error', ['message' => 'Error al hacer la solicitud API']);
        }
    }
}
