<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ProductoModel;
use App\Models\Venta_Model;
use App\Models\VentaDetalle_Model;

class Ventas_Controllers extends baseController
{


    public function listar_compras()
    {
        $compra = new VentaDetalle_Model();

        $detalle = $compra

            ->join('productos', 'id = producto_id')
            ->join('ventas', 'id_venta = venta_id')->where('usuario_id', session()->id)->findAll();

        $data['titulo'] = 'Compras - GofI Shop';
        $dat['detalles'] = $detalle;

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/listar_compras', $dat);
        echo view('front/footer_view');
    }


    public function listar_ventas()
    {

        $venta = new Venta_Model();

        $ventas = $venta->select("*")->join("usuarios", "usuarios.id = ventas.usuario_id")->findAll();

        $data['titulo'] = 'Lista ventas - GofI Shop';
        $data['ventas'] = $ventas;
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/listar_ventas');
        echo view('front/footer_view');
    }

    public function ver_detalles($id)
    {
        $ventDetalle = new VentaDetalle_Model();
        $ventDetalle->select('*');


        $detalle = $ventDetalle

            ->join('productos', 'id = producto_id')
            ->join('ventas', 'id_venta = venta_id')->where('usuario_id', $id)->findAll();

        $dat['ventas'] = $detalle;
        $data['titulo'] = 'Detalle venta - GofI';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/listar_detalle', $dat);
        echo view('front/footer_view');
    }


}