<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SubCategoriasAdminController extends Controller
{
    //
    public function subCategorias($categoria, $idCategoria) {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            
        ]);

        $response = $client->request('GET', '/auth/subCategories/obtener/subCategories/categories', ['query' => ['categoria' => $categoria]]);

        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $arr_body = json_decode($body);

            return view('subCategoriasAdmin', compact('arr_body', 'categoria', 'idCategoria'));
        }
    }
}
