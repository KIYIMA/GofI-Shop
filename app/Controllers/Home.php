<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ProductoModel;


class Home extends BaseController
{
    public function __construct(){
        helper('form');
        $this->session = \Config\Services::session(); 
    }

    
    public function index()
    {
        $producto = new ProductoModel();
    
        $datos['productos'] = $producto->orderBy('id','ASC')->findAll();

        $data['titulo'] = "GofI Shop";
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/principal',$datos);
        echo view('front/footer_view');
    }

    public function catálogoProductos(){
        $data['titulo'] = "Productos - GofI Shop";
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/catálogoProductos_view');
        echo view('front/footer_view');
        
    }

    public function getComercializacion(){
        $data['titulo'] = "Comercializacion - GofI Shop";
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/comercializacion_view');
        echo view('front/footer_view');
        
    }

    public function getContacto(){
        $data['titulo'] = "Contacto - GofI Shop";
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/contacto_view');
        echo view('front/footer_view');
        
    }
    public function getAcercaDe(){
        $data = ['titulo'=>'Acerca De - GofI Shop'];
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/quienes_somos');
        echo view('front/footer_view');
    }
    
    
    public function getTerminosUsos(){
        
        $data['titulo'] = "Terminos y usos - GofI Shop";
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/Terminos_Usos_view');
        echo view('front/footer_view');
    }
    public function getListar(){
        echo view('front/nav_view');
    }
    
}
