<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;
use CodeIgniter\Validation\Validation;

class ComputerController extends Controller{
    public function __construct(){
        helper('form');
        $this->session = \Config\Services::session(); 
    }

   
    
    public function ProductoParaUsuarios(){
        $data['titulo'] = "Lista de Productos - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/catalogo',$datos);
        echo view('front/footer_view');

    }
    

    public function getListaProducto(){
        $data['titulo'] = "Lista productos - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/listaProductos',$datos);
        echo view('front/footer_view');
    }
    
    public function search(){
        $productName = $this->request->getVar('search');
        $data['titulo'] = $productName ." - Resultados";

        $productos= new ProductoModel();

        $datos['resul']=[
            'resultados' => $productos->select('*')->like('nombre',$productName)->findAll(),
            'search' => $productName
        ];
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/result_view',$datos);
        echo view('front/footer_view');
    }

    public function filterPrecio(){

        $productName = $this->request->getVar('search');
        $data['titulo'] = $productName ." - Resultados";
        $productos= new ProductoModel();
        
       
        $datos['resul']=[
            'resultados' => $productos->orderBy('precioPC','ASC')->findAll(),
            'search' => $productName
        ];

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/result_view',$datos);
        echo view('front/footer_view');
    }
    public function filterPCs(){
        $productName = $this->request->getVar('search');
        $data['titulo'] = $productName ." - Resultados";

        $productos= new ProductoModel();
        $result['resultados'] = $productos->select('*')->like('nombre',$productName)->findAll();
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/result_view',$result);
        echo view('front/footer_view');
    }
    public function filterLaptops(){
        $productName = $this->request->getVar('search');
        $data['titulo'] = $productName ." - Resultados";

        $productos= new ProductoModel();
        $result['resultados'] = $productos->select('*')->like('nombre',$productName)->findAll();
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/result_view',$result);
        echo view('front/footer_view');
    }
    
    public function getEliminarProducto(){
        $data['titulo'] = "Lista de eliminados - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/productosEliminados',$datos);
        echo view('front/footer_view');
    }

    public function getAltaProducto($id=null){
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back();
            }else{
                $computador= new productoModel();

                $datos=[
                    'eliminado' => 0
                ];
                
                $computador->update($id,$datos);
                
                return $this->response->redirect(site_url('listaProductosEliminados'));
                
            }
        }
        
        return $this->response->redirect(site_url('listaProductos'));
    }
    
    public function productosEnOferta(){
        $data['titulo'] = "Productos en oferta - GofI Shop";

        $computador= new ProductoModel();
        $datos['productos']= $computador->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/productoEnOferta',$datos);
        echo view('front/footer_view');
    }

    public function enOferta($id=null){
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back()->with('successfaild',[
                    'body' => 'No eres administrador !!!'
                ]);
            }else{
                $computador= new ProductoModel();

                $datos['productos']= $computador->findAll();

                $cont=0;
                foreach($datos['productos'] as $producto){
                    if($producto['enOferta'] == 1){    
                        $cont ++;
                    }
                }

                if($cont < 3){

                    $datos= $computador->find($id);
                    if($datos['enOferta'] != 1){
                        $data=[
                            'enOferta' => 1
                        ];
                        $computador->update($id,$data);
                        return redirect()->back()->with('success',[
                            'body' => 'Agregado a ofertas !!!'
                        ]);
                    }else{
                        return redirect()->back()->with('warning',[
                            'body' => 'Producto ya en oferta !!!'
                        ]);
                    }

                }else{

                    return redirect()->back()->with('successfaild',[
                        'body' => 'Solo se admiten 3 productos en oferta !!!'
                    ]);

                }  
            }

        }
    }

    public function quitarOferta($id=null){
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back()->with('successfaild',[
                    'body' => 'No eres administrador !!!'
                ]);
            }else{
                $computador= new ProductoModel();
                
                $datos=[
                    'enOferta' => 0
                ];
                
                $computador->update($id,$datos);
                
                return redirect()->back()->with('successfaild',[
                    'body' => 'Quitado de ofertas !!!'
                ]);
                
                
            }
        }
        
        return $this->response->redirect(site_url('listaProductos'));
    }

    public function cargarProducto(){
        $data['titulo'] = "Agregar producto - GofI Shop";

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/cargarProducto');
        echo view('front/footer_view');
    }
    
    public function getAñadirProducto(){
        if(!$this->validate('producto')){
            $data['titulo'] = "Añadir productos - GofI Shop";

            $computador= new productoModel();
            
            echo view('front/head_view',$data);
            echo view('front/nav_view');
            echo view('front/cargarProducto', [
                'validation' => $this->validator
            ]);
            echo view('front/footer_view');
        }else{
            if($imagen=$this->request->getFile('imagen')){
                $computador= new ProductoModel();
                
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('./assets/uploads/imgProductos',$nuevoNombre);
                $datos=[
                    'nombre'               =>$this->request->getVar('nombre'),
                    'descripciónGeneral'   =>$this->request->getVar('descripciónGeneral'),
                    'procesador'           =>$this->request->getVar('procesador'),
                    'ram'                  =>$this->request->getVar('ram'),
                    'almacenamiento'       =>$this->request->getVar('almacenamiento'),
                    'tamañoPantalla'       =>$this->request->getVar('tamañoPantalla'),
                    'tipoDisplay'          =>$this->request->getVar('tipoDisplay'),
                    'resolución'           =>$this->request->getVar('resolución'),
                    'touch'                =>$this->request->getVar('touch'),
                    'stock'                =>$this->request->getVar('stock'),
                    'tipoDispositivo'      =>$this->request->getVar('tipoDispositivo'),
                    'precioCompra'         =>$this->request->getVar('precioCompra'),
                    'precioPC'             =>$this->request->getVar('precioPC'),
                    'imagenPC'             =>$nuevoNombre
                ];
                $computador->insert($datos);
                return $this->response->redirect(site_url('listaProductos'));
            }else{
                return $this->response->back();
            }
        }

    }

    public function getEditarProducto($id=null){
        $data['titulo'] = "Editar productos - GofI Shop";

        $computador= new productoModel();
        $comp['array'] = $computador->find($id);
        
        
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/editarProducto',$comp);
        echo view('front/footer_view');

    }
    
    public function getActualizarProducto(){
        $computador= new productoModel();
        
        $datos=[
            'tipoDispositivo'      =>$this->request->getVar('tipoDispositivo'),
            'nombre'               =>$this->request->getVar('nombre'),
            'descripciónGeneral'   =>$this->request->getVar('descripciónGeneral'),
            'procesador'           =>$this->request->getVar('procesador'),
            'ram'                  =>$this->request->getVar('ram'),
            'cantidadCanalMemoria' =>$this->request->getVar('cantidadCanalMemoria'),
            'almacenamiento'       =>$this->request->getVar('almacenamiento'),
            'gráfica'              =>$this->request->getVar('gráfica'),
            'puertosHdmi'          =>$this->request->getVar('puertosHdmi'),
            'puertosHdmiMini'      =>$this->request->getVar('puertosHdmiMini'),
            'puertoUsb2'           =>$this->request->getVar('puertoUsb2'),
            'puertoUsb3'           =>$this->request->getVar('puertoUsb3'),
            'puertoUsb31'          =>$this->request->getVar('puertoUsb31'),
            'puertoUsb31C'         =>$this->request->getVar('puertoUsb31C'),
            'bluetooth'            =>$this->request->getVar('bluetooth'),
            'wifi'                 =>$this->request->getVar('wifi'),
            'puertoEthernet'       =>$this->request->getVar('puertoEthernet'),
            'peso'                 =>$this->request->getVar('peso'),
            'ancho'                =>$this->request->getVar('ancho'),
            'profundidad'          =>$this->request->getVar('profundidad'),
            'alto'                 =>$this->request->getVar('alto'),
            'tamañoPantalla'       =>$this->request->getVar('tamañoPantalla'),
            'tipoDisplay'          =>$this->request->getVar('tipoDisplay'),
            'resolución'           =>$this->request->getVar('resolución'),
            'touch'                =>$this->request->getVar('touch'),
            'frecuenciaRefresco'   =>$this->request->getVar('frecuenciaRefresco'),
            'lectoraDvd'           =>$this->request->getVar('lectoraDvd'),
            'tecladoLuminoso'      =>$this->request->getVar('tecladoLuminoso'),
            'padNumérico'          =>$this->request->getVar('padNumérico'),
            'webCam'               =>$this->request->getVar('webCam'),
            'stock'           =>$this->request->getVar('stock'),
            'precioCompra'             =>$this->request->getVar('precioCompra'),
            'precioPC'             =>$this->request->getVar('precioPC')
        ];
        $id= $this->request->getVar('id');
        $computador->update($id,$datos);

        $validation = $this->validate([
           'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/webp,image/png]',
                'max_size[imagen,1024]',
                ]
        ]);
        if($validation){
            if($imagen=$this->request->getFile('imagen')){
                $datoPc=$computador->where('id',$id)->first();
                $ruta= ('./assets/uploads/imgProductos/'.$datoPc['imagenPC']);
                unlink($ruta);
                
                $nuevoNombre=$imagen->getRandomName();
                $imagen->move('./assets/uploads/imgProductos',$nuevoNombre);
                $datos=['imagenPC' =>$nuevoNombre];
                $computador->update($id,$datos);
            }else{
                return $this->response->redirect(site_url('listaProductos'));
            }
        }

        return $this->response->redirect(site_url('listaProductos'));
    }
    
    
    public function getBorrarProducto($id=null){
        
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back();
            }else{
                $computador= new productoModel();

                $datos=[
                    'eliminado' => 1
                ];
                
                $computador->update($id,$datos);
                
                return $this->response->redirect(site_url('listaProductos'));
            }
        }
        
        return $this->response->redirect(site_url('listaProductos'));
    }

    public function getCadaProducto($id=null){
        $computador= new productoModel();
        
        $producto= $computador->find($id);
        $data['titulo'] = $producto['descripciónGeneral']." - GofI Shop";
        
        $comp['array'] = $computador->find($id);
       
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/cadaProducto',$comp);
        echo view('front/footer_view');
    }

}