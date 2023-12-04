<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CategoriaController extends Controller
{
    //
    public function index(){
        return view('categorias');
    }
    //
    public function categorias(){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://localhost:8080',
            //'auth' => ['Gerardo', '1234'],
        ]);

        $response = $client->request('GET', '/auth/categoria/obtener', [
            'query' => [
                
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            // La solicitud fue exitosa
            $body = $response->getBody();
            $arr_body = json_decode($body);

            return $arr_body;
        } else {
            // Manejar el caso en que la solicitud no fue exitosa
            return view('error', ['message' => 'Error al hacer la solicitud API']);
        }
    }
}
