<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DateTime;

class VentaController extends Controller
{

    public function finalizar(Request $request)
    {
        $consumoRecibido = $request->input('consumo.0.total');
        $contador = $request->input('contador');
        $usuarioId = $request->input('usuario.0.id');
        $username = $request->input('usuario.0.username');
        $contra = $request->input('usuario.0.password');

        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'auth' => ["$username", "$contra"],
        ]);

        //crear el pedido
        $jsonDataPedido = json_encode([
            'amount' => $consumoRecibido,
        ]);

        $response = $client->request('POST', '/auth/order/crear', [
            'query' => [
                'idCliente' => $usuarioId,
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonDataPedido, 'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => $jsonDataPedido,
        ]);

        if ($response->getStatusCode() == 200) {
            $responseBody = $response->getBody()->getContents();
            $idPedido = (int)$responseBody;

            //creamos el detalle pedido para cada producto comprado
            for ($i = 0; $i < $contador; $i++) {
                $cantidad = $request->input("objetos.$i.cantidad");
                $idProducto = $request->input("objetos.$i.idProducto");

                $jsonDataDetallePedido = json_encode([
                    'quantity' => $cantidad,
                    'products' => [
                        'idProduct' => $idProducto,
                    ]
                ]);

                $responseDetalle = $client->request('POST', '/auth/orderDetails/crear', [
                    'query' => [
                        'idPedido' => $idPedido,
                        'idProducto' => $idProducto
                    ],
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'body' => $jsonDataDetallePedido,
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Error en la solicitud API',
            ], $response->getStatusCode());
        }

        //creamos la venta
        if (($response->getStatusCode() == 200) && ($responseDetalle->getStatusCode() == 200)) {
            $date = new DateTime();
            $fechaHoraFormateada = $date->format('Y-m-d');

            $isv = $request->input('consumo.0.impuesto');
            $total = $request->input('consumo.0.total');

            $jsonDataDetalleVenta = json_encode([
                'idPedido' => $idPedido,
                'date' => $fechaHoraFormateada,
                'subTotal' => $consumoRecibido,
                'isv' => $isv,
                'total' => $total
            ]);

            $responseVenta = $client->request('POST', '/auth/sales/crear', [
                'query' => [
                    'idPedido' => $idPedido
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $jsonDataDetalleVenta,
            ]);
        } else {
            return response()->json([
                'error' => 'Error en la solicitud API',
            ], $responseDetalle->getStatusCode());
        }

        if ((($response->getStatusCode() == 200) &&
            ($responseDetalle->getStatusCode() == 200) &&
            ($responseVenta->getStatusCode() == 200))) {

            return redirect(route('categorias.index'));
        }

    }
}
