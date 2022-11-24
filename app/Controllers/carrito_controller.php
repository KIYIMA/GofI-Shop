<?php

//Tareas a realizar en el carrito_controller:
// 1) Agregar producto al carrito si hay stock
//  2) Quitar producto del carrito si esta en el carrito
//  3) Agregar unidad de cada producto uno por uno si hay stock
//  4) Quitar producto por unidad
//  5) Saber la cantidad de productos en el carrito de un producto específico
//  6) Sumar los precios de los productos (de cada productos y del total completo de los productos)

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ProductoModel;
use App\Models\VentaDetalleModel;
use App\Models\VentaModel;
use App\Models\CarritoModel;
use App\Models\ComprasModel;


class carrito_controller extends BaseController
{

    
    
    public function add($id=null){
        
        $request = \Config\Services::request();
        
        $usuario = new Usuario();
        $carritoM = new CarritoModel();
        $productosM = new ProductoModel();
        $productos = $productosM->select("*")->findAll();
        $productCart = $carritoM->select("*")->findAll();
         
         $count = 0;
         $countC = 0;
        foreach($productos as $pro){
            $count++;
        }
        foreach($productCart as $pCart){
            $countC++;
        }

        if($count > 0){
            
            $datoProducto = $productosM->where('id',$id)->first();
            $cont=0;
            foreach($datoProducto as $i){
                $cont++;
            }
            if($cont > 0){
                $cantidad = $datoProducto["stock"];
                if($cantidad >0){

                    if($countC > 0){
                        
                        $datoPc=$carritoM->where('producto_id',$id)->first();
                        if($datoPc){
                            $c=0;
                            foreach($datoPc as $i){
                                $c++;
                            }
                        }else{
                            $c=0;
                        }

                        if( $c > 0){
                            if(($datoProducto['stock']-$datoPc['cantidad'] > 0)){
                                $cant = $datoPc['cantidad'] + 1 ;
                                $subtotal = $datoPc['subtotal'] + $datoPc['subtotal'];
                                $datos=[
                                    'subtotal' => $subtotal,
                                    'cantidad' => $cant
                                ];
                                
                                $carritoM->update($datoPc['carrito_id'],$datos);
                                
                                return redirect()->back()->with('success',[
                                    'body' => 'Agregado al carrito !!!'
                                ]);
                            }else{
                                return redirect()->back()->with('successfaild',[
                                    'body' => 'Alcanzó el stock disponible !!!'
                                ]);
                                
                            }

                        }else{
                            $datos=[
                                'usuario_id' => session('id'),
                                'producto_id' => $datoProducto['id'],
                                'subtotal' => $datoProducto['precioPC'],
                                'cantidad' => 1,
                                'precio' => $datoProducto['precioPC'],
                            ];
                            
                            $carritoM->insert($datos);
                            return redirect()->back()->with('success',[
                                'body' => 'Agregado al carrito !!!'
                            ]);
                        }
                        
                    }else{
                        $datos=[
                            'usuario_id' => session('id'),
                            'producto_id' => $datoProducto['id'],
                            'subtotal' => $datoProducto['precioPC'],
                            'cantidad' => 1,
                            'precio' => $datoProducto['precioPC'],
                        ];
                        
                        $carritoM->insert($datos);
                        return redirect()->back()->with('success',[
                            'body' => 'Agregado al carrito !!!'
                        ]);
                        
                    }
                    
                }else{
                    return redirect()->back()->with('successfaild',[
                        'body' => 'No hay stock !!!'
                    ]);
                }
            }else{
                echo($id);
            }
        }
    }

  
    public function comprarProductoDirecto ($id=null){
        $this->session = \Config\Services::session(); 
        
        $compras = new ComprasModel();
        $productos = new ProductoModel();
        $ventas = new VentaModel();
        $computador= new productoModel();
        $ventaDetalle = new VentaDetalleModel();

        $producto= $computador->find($id);
        $fechaActual = date('Y-m-d');

        $datoCompra=[
            "compra_fecha"  => $fechaActual,
            "compra_producto_id" => $id,
            "compra_usuario_id" => session('id'),
            "compra_cantidad" => 1,
            "compra_subtotal"  => $producto['precioPC']
        ];
        $idCompra = $compras->insert($datoCompra);

        $cantidad = $productos->select("*")->where("id", $id)->first();
        $dato=[
            "stock" => $cantidad["stock"] - 1
        ];
        $productos->update($id,$dato );
        
        
        $datoVenta=[
            "fecha_venta"  => $fechaActual,
            "compra_id"   => $idCompra,
            "total_venta"  => $producto['precioPC']
        ];
        //$idFactura = $ventas->insert($datoVenta);
        $idVenta = $ventas->insert($datoVenta);

        $stock=[
            'stock' => $producto['stock'] - 1, 
        ];
        $computador->update($id,$stock);

        
        $datosVentaDetalle=[
            "venta_id"              => $idVenta, 
            "producto_id"           => $producto["id"],
            "precio_ventaDetalle"   => $producto["precioPC"], 
            "total_ventaDetalle"    => $producto["precioPC"],
            "cantidad_ventaDetalle" => 1
        ];
        $ventaDetalle->insert($datosVentaDetalle);
        
        return redirect()->route('listar_compras');
    }

    public function comprar_carrito(){
        $this->session = \Config\Services::session(); 
    
        $tablaCarrito = new CarritoModel();
        $tablaCompras = new ComprasModel();
        $tablaProductos = new ProductoModel();
        $tablaVenta = new Venta_Model();
        $tablaComputador= new productoModel();
        $tablaVentaDetalle = new VentaDetalle_Model();

        $productosCart = $tablaCarrito->select("*")->join('productos', 'id = producto_id')->where('usuario_id', session('id'))->findAll();

        //Actualizar el stock del producto
        foreach ($productosCart as $e) {
            $data = [
                'stock' => $e['stock'] - $e['cantidad']
            ];
            $tablaProductos->update($e['producto_id'],$data);
        }

        //Cargo la tabla de compras
        $montoTotal = 0;
        foreach($productosCart as $e){
            $montoTotal+= $e["subtotal"];
            $cantTotalProductos += $e['cantidad'];
            $datos = [
                'compra_fecha' => date('Y-m-d'),
                'compra_producto_id'   => $e['producto_id'],
                'compra_usuario_id'    => session('id'),
                'compra_cantidad'      => $e['cantidad'],
                'compra_subtotal'      => $e['subtotal']
            ];
            $tablaCompras->insert($datos);
        }
        
        //Bacio el carrito
        foreach ($productosCart as $e) {
            $tablaCarrito->delete($e['carrito_id']);
        }
        
        //Cargar la tabla de ventas
        $compras = $tablaCompras->select('*')->findAll();

        foreach ($compras as $e) {
            $datos = [
                'fecha_venta' => $e['compra_fecha'],
                'compra_id'   => $e['compras_id'],
                'total_venta' => $e['compras_subtotal']
            ];
            $tablaVenta->insert($datos);
        }

    }

    // A programar
    public function ProductosParaUsuarios(){
        $data['titulo'] = "Lista de Productos - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','DESC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/catalogo',$datos);
        echo view('front/footer_view');
    }


    public function carroCompra(){

        $carritoM = new CarritoModel();
        $datos['carro']= $carritoM->select('*')->join('productos', 'id = producto_id')->where('usuario_id', session('id'))->findAll();

        $data['titulo'] = "Carrito - GofI Shop";

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/carrito_parte_view',$datos);
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
        
        $request = \Config\Services::request();

        $tablaCarrito= new CarritoModel();
        $todo = $tablaCarrito->select('*');
        $product = $todo->from('productos')
                        ->where('carrito.producto_id', $rowid)->first();

        if($product['cantidad'] < $product['stock']){
            $tablaCarrito->update($rowid ,[ 
                "subtotal" => $product['subtotal'] + $product['precioPC'],
                "cantidad" => $product['cantidad']+1
            ]);
            return redirect()->back();
        }else{
            return redirect()->back()->with('successfaild',[
                'body' => 'Alcanzo el stock disponible !!!'
            ]);
        }
 
    }

    public function restarCantidad($rowid){
        
        $request = \Config\Services::request();

        $tablaCarrito= new CarritoModel();
        $productCart = $tablaCarrito->select("*")->where("carrito_id", $rowid)->first();

        if($productCart["cantidad"] > 1){
            $tablaCarrito->update($productCart['carrito_id'],[ 
                "subtotal" => $productCart['subtotal'] - $productCart['precio'],
                "cantidad" => $productCart["cantidad"] - 1
            ]);
            return redirect()->back();
        }else{
            $tablaCarrito->delete($productCart['carrito_id']);
            return redirect()->back();
        }
    }

    public function borrarProducto($rowid){

        $request = \Config\Services::request();

        $tablaCarrito= new CarritoModel();
        $cart= $tablaCarrito->select("*");
        $cart->delete($rowid);
        return $this->response->redirect(site_url('carrito'));
    }

    public function destroy(){
        $this->session = \Config\Services::session(); 

        $tablaCarrito= new CarritoModel();
        $carrito = $tablaCarrito->select('*')->where('usuario_id', session('id'))->findAll();

        
        foreach ($carrito as $row) {
            $tablaCarrito->delete($row['carrito_id']);
        }
        return $this->response->redirect(site_url('carrito'));
    }
}