<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ProductoModel;
use App\Models\VentaDetalle_Model;
use App\Models\Venta_Model;


class carrito_controller extends BaseController
{

    
    public function add(){
        
        $request = \Config\Services::request();
        $cart = \Config\Services::cart();

        $productos = $cart->contents();
        foreach($productos as $producto){
            if($producto["id"] == $request->getPost('id')){
                $cantidad = $producto["qty"];
                $cantidadMax = $producto["stock"] - $request->getPost('stockMinimo');

                if($cantidad < $cantidadMax){ 
                    $cart->update(array(
                        "rowid" => $producto["rowid"],
                        "qty" => $cantidad+1
                    ));
                    return redirect()->back()->with('success',[
                        'body' => 'Agregado al carrito !!!'
                    ]);
                }else{
                    return redirect()->back()->with('successfaild',[
                        'body' => 'Alcanzó el stock mínimo !!!'
                    ]);
                }
                
            }
        }

        $cart->insert(array(
            'id'      => $request->getPost('id'),
            'qty'     => 1,
            'price'   => $request->getPost('precio'),
            'name'    => $request->getPost('nombre'),
            'stock'   => $request->getPost('stock'),
            'options' => array(
                                'stockMinimo' => $request->getPost('stockMinimo'),
                                'id_producto' => $request->getPost('id')
                              )
            ));
            return redirect()->back()->with('success',[
                'body' => 'Agregado al carrito !!!'
            ]);
    }


    public function comprarProductoDirecto ($id=null){
        $this->session = \Config\Services::session(); 
        
        $ventaCabecera = new Venta_Model();
        $computador= new productoModel();


        $producto= $computador->find($id);
        $dato=[
            "fecha_venta"  => date('Y-m-d'),
            "total_venta"  => $producto['precioPC'], 
            "usuario_id"   => session()->id
        ];
        $idFactura = $ventaCabecera->insert($dato);


        $datos=[
            'stock' => $producto['stock'] - 1, 
        ];
        $computador->update($id,$datos);


        $ventaDetalle = new VentaDetalle_Model();

        
        $ventaDetalle->insert([
            "venta_id"              => $idFactura, 
            "producto_id"           => $producto["id"],
            "precio_ventaDetalle"   => $producto["precioPC"], 
            "cantidad_ventaDetalle" => 1
        ]);
        
        return redirect()->route('listar_compras');
    }

    public function comprar_carrito(){
        $this->session = \Config\Services::session(); 
        $cart = \Config\Services::cart();
    
        $productos = $cart->contents();
        $montoTotal = 0;
        foreach($productos as $producto){
            $montoTotal+= $producto["price"] * $producto["qty"];
        }

        $ventaCabecera = new Venta_Model();
        $dato=[
            "fecha_venta" => date('Y-m-d'),
            "total_venta" => $montoTotal, 
            "usuario_id" => session()->id
        ];

        $idFactura = $ventaCabecera->insert($dato);


        $ventaDetalle = new VentaDetalle_Model();
        $producto_model = new ProductoModel();

        foreach($productos as $producto){
            $ventaDetalle->insert([
                "venta_id" => $idFactura, 
                "producto_id" => $producto["id"],
                "precio_ventaDetalle" => $producto["price"], 
                "cantidad_ventaDetalle" => $producto["qty"]
            ]);
            $producto_model->update($producto["id"], ["stock" => $producto["stock"] - $producto["qty"] ]);
        }
        
        $cart->destroy();

        return redirect()->route('listar_compras');
    }

    public function ProductosParaUsuarios(){
        $data['titulo'] = "Lista de Productos - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','DESC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/catalogo',$datos);
        echo view('front/footer_view');
    }

    public function busqueda($productName){
        $data['titulo'] = "Resultado busqueda";

        $computador= new ProductoModel();
        $resultados['resu'] = $computador->where('nombre',$productName)->like($productName.'%');

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/result_view',$resultados);
        echo view('front/footer_view');

    }
    

    public function carroCompra(){

        $cart = \Config\Services::cart();
        $cart = array('cart' => $cart);

        $data['titulo'] = "Carrito - GofI Shop";

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/carrito_parte_view',$cart);
        echo view('front/footer_view');
    }


    public function actualiza_carrito(){
        $cart = \Config\Services::Cart();

        $request = \Config\Services::request();
        $cart->update(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precioPC'),
            'name' => $request->getPost('nombre')
        ));
        return $this->redirect()->back()->whithInput();
    }


    public function sumarCantidad($rowid){
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();

        $options = $cart->productOptions($cart->getItem($rowid)['rowid']);
        $cantidad = $cart->getItem($rowid)['qty'];
        $cantidadMax = $cart->getItem($rowid)['stock'] - $options['stockMinimo'];
        
        if($cantidad < $cantidadMax){
            $cart->update(array(
                "rowid" => $rowid,
                "qty" => $cantidad+1
            ));
            return redirect()->back()->with('success',[
                'body' => 'Agregado al carrito !!!'
            ]);
        }else{
            return redirect()->back()->with('successfaild',[
                'body' => 'Alcanzó el stock mínimo !!!'
            ]);
        }
 
    }


    public function restarCantidad($rowid){
        
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();

        $productos = $cart->contents();


        foreach($productos as $producto){
            break;
        }

        if($producto["qty"] > 1){
            $cart->update(array(
                "rowid" => $producto["rowid"],
                "qty" => $producto["qty"] - 1
            ));
            return redirect()->back()->with('success',[
                'body' => 'Producto eliminado del carrito !!!'
            ]);
        }else{
            $cart->destroy();
            return redirect()->back()->with('success',[
                'body' => 'Producto eliminado del carrito !!!'
            ]);
        }
    }


    public function borrarProducto($rowid){
        
        $cart = \Config\Services::Cart();

        $request = \Config\Services::request();
        $cart->remove($rowid);
        return $this->response->redirect(site_url('carrito'));
    }

    public function destroy(){
        $cart = \Config\Services::Cart();
        $cart->destroy();

        return $this->response->redirect(site_url('carrito'));
    }

    
}