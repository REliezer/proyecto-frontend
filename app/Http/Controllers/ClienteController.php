<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClienteController extends Controller
{
    //
    public function crearCliente() {
        return view('crearCliente');
    }

    public function guardarCliente(Request $request) {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ['grod', '1234'],
        ]);

        $jsonData = json_encode([
            'user' => $request->input("formData"),
            'city' => $request->input("ciudad"),
            'address' => $request->input("direccion"),
            'zipCode' => $request->input("zipCode"),
        ]);

        $response = $client->request('POST', '/auth/user/registrar', [
            'query' => [
                
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonData, 'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonData,
        ]);

        return view('crearCliente');
    }

    public function actualizarCliente() {
        return view('editarCliente');
    }

    public function login() {
        return view('login');
    }

    public function loginCorreo(Request $request){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ['grod', '1234'],
        ]);
        
        $response = $client->request('GET', '/auth/user/buscar/correo', [
            'query' => [
                'email' => $request->input("correo"),
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            $id = (int)$responseBody;

            $response = $client->request('GET', '/auth/user/buscar', [
                'query' => [
                    'idCliente' => $id
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
    
            if ($response->getStatusCode() == 200) {
                $responseBody = $response->getBody();
                
                return redirect(route('categorias.index'));
            }
        }
        
    }

    public function buscarCliente($correo){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ['grod', '1234'],
        ]);
        
        $response = $client->request('GET', '/auth/user/buscar/correo', [
            'query' => [
                'email' => $correo
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            return (int)$responseBody;
        }
        
    }

    public function buscarClienteId($id){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ['grod', '1234'],
        ]);
        
        $response = $client->request('GET', '/auth/user/buscar', [
            'query' => [
                'idCliente' => $id
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody();
            return $responseBody;
        }
        
    }
}
