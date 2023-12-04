<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class ProductoController extends Controller
{
    //
    public function index(){
        return view('productos');
    }

    public function finalizar(){
        return view('finalizarCompra');
    }

    public function buscarProducto($idProducto){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            
        ]);

        $response = $client->request('GET', '/auth/products/buscar', [
            'query' => [
                'idProducto' => $idProducto,
            ],
        ]);

        if ($response->getStatusCode() == 200) {
            // La solicitud fue exitosa
            $body = $response->getBody();
            $arr_body = json_decode($body, true);

            return $body;
        } else {
            // Manejar el caso en que la solicitud no fue exitosa
            return view('error', ['message' => 'Error al hacer la solicitud API']);
        }
    }

    public function productos(){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            //'auth' => ['Gerardo', '1234'],
        ]);

        $response = $client->request('GET', '/auth/products/obtener', [
            
        ]);

        if ($response->getStatusCode() == 200) {
            // La solicitud fue exitosa
            $body = $response->getBody()->getContents();
            // Sin el segundo parámetro true para devolver un objeto en lugar de un array
            $arr_body = json_decode($body, true);

            foreach ($arr_body as $item) {
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

            return $arr_body;

        } elseif ($response->getStatusCode() == 404) {
            // El producto no fue encontrado o no existe
            return view('error', ['message' => 'Producto no encontrado']);
        }else {
            return view('error', ['message' => 'Error al hacer la solicitud API']);
        }
    }
}
