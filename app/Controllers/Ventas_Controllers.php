<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ProductoModel;
use App\Models\VentaModel;
use App\Models\VentaDetalleModel;
use App\Models\ComprasModel;

class Ventas_Controllers extends BaseController
{


    public function listar_compras()
    {
        $compra = new ComprasModel();

        $compras['compra'] = $compra->select("*")->from('productos')->where('id = compra_producto_id')->findAll();

        $data['titulo'] = 'Compras - GofI Shop';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/listar_compras',$compras);
        echo view('front/footer_view');
    }


    public function listar_ventas()
    {
        $this->session = \Config\Services::session(); 

        $venta = new VentaModel();
        $data['titulo'] = 'Lista de ventas - GofI Shop';
        

        $datos['ventas'] = $venta->select("*")
        ->join('compras','compras.compras_id = venta.compra_id')
        ->join('usuarios', 'usuarios.id = compras.compra_usuario_id')->findAll();


        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/listar_ventas',$datos);
        echo view('front/footer_view');
    }

    public function ver_detalles($id)
    {
        $ventDetalle = new VentaDetalleModel();
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