<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class categoriasAdminController extends Controller
{
    //

    public function categorias() {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            
        ]);

        $response = $client->request('GET', '/auth/categoria/obtener');

        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $arr_body = json_decode($body);

            return view('categoriasAdmin', compact('arr_body'));
        }

    }
}
