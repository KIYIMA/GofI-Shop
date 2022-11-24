<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuario;
use App\Models\ConsultaModel;
use App\Filters\Auth;




class UsuariosController extends Controller{
    
    public function __construct(){ 
        helper('form');
        $this->session = \Config\Services::session(); 

    }
    public function vistaUsuarios($puser=null){
        $data['titulo'] = "Home - GofI Shop";
        $user['usuario'] =  $puser;

        echo view('front/head_view',$data);
        echo view('front/nav_view',$user);
        echo view('front/principal');
        echo view('front/footer_view');
    }
   
    public function consultaUsuario(){
        if((isset($_SESSION['logged'])) ){
            
            $formModel = new consultaModel();

            if (!$this->validate('consulta')) {
                $data['titulo'] = "Contacto - GofI Shop";
                echo view('front/head_view',$data);
                echo view('front/nav_view');
                echo view('front/contacto_view', ['validation' => $this->validator]);
                echo view('front/footer_view');
                
            }else {
                if(session('logged')){
                    $formModel->insert([
                        'id_usuario'        => session('id'),
                        'email_consulta'    => $this->request->getVar('email'),
                        'consulta'          => $this->request->getVar('consulta'),
                        'fecha_consulta'    =>  date('Y-m-d H:i:s')
                    ]);  

                    //Enviar correo

                    $header ="From: ". $this->request->getVar('email') . "\r\n";
                    $header.= "Reply-To: noreply@example.com"."\r\n";
                    $header.= "X-Mailer: PHP/". phpversion();

                    $receptor="emanuellezcano999@gmail.com";
                    $asunto = "GOFI SHOP CONSULTAS";
                    $cuerpo = $this->request->getVar('consulta');

                    @mail($receptor, $asunto, $cuerpo,$header);

                    return redirect()->back()->with('success',[
                        'body' => 'Consulta enviada !!!'
                    ]);
                }else{
                    return redirect()->back()->with('successfaild',[
                        'body' => 'Para realizar una consulta primero debe registrarse !!!'
                    ]);
                }
            }  
        }else{    
            $data['titulo'] = "Contacto - GofI Shop";
            echo view('front/head_view',$data);
            echo view('front/nav_view');
            echo view('front/contacto_view');
            echo view('front/footer_view');
            echo ("<script>alert('No has iniciado sesion aún !!!')</script>");
        }
    }

    public function listarConsultas(){
        $data['titulo'] = "Consultas - GofI Shop";
        
        $consulta= new ConsultaModel();
        $datos['consultas']= $consulta->select("*")->findAll();

            echo view('front/head_view',$data);
            echo view('front/nav_view');
            echo view('front/listar_consultas', $datos);
            echo view('front/footer_view');
    }

    public function getRegistrar(){
        
        if(!(isset($_SESSION['logged'])) || (session('perfilUsu') == 1)){
            $data['titulo'] = "Registro - GofI Shop";
            echo view('front/head_view',$data);
            echo view('front/nav_view');
            echo view('front/registro_view');
            echo view('front/footer_view');
            
        }else{    
            return redirect()->back()->with('noPuedeRegistrar',[
                    'body' => 'No puede acceder a esta sección, cierre sesion o inicie como administrador !!!'
                ]);;
        }
        
    }

    public function getIniciar(){
        if(!(isset($_SESSION['logged']))){
            $data['titulo'] = "Iniciar - GofI Shop";

            echo view('front/head_view',$data);
            echo view('front/nav_view');
            echo view('front/Iniciar_view');
            echo view('front/footer_view');
            
        }else{    
            return redirect()->back()->with('sesionYaActiva',[
                    'body' => 'Sesion ya activa !!!'
                ]);
        }
        
    }
    
    public function iniciarUsuario(){
        if(!(isset($_SESSION['logged']))){

            $formModel = new Usuario();
            $usuario= trim($_POST['emailI']);
            $contrasena= trim($_POST['passI']);

            $input = $this->validate([
                'passI'   => 'required|min_length[4]|max_length[10]',
                'emanilI'    => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.emailUsu]',
            ]);

            
            if(($user = $formModel->getUserBy('emailUsu', $usuario))){
                if(password_verify($contrasena,$user["passwordUsu"])){
                    $newdata = [
                        'id'  => $user["id"],
                        'nombreUsu'  => $user["nombreUsu"],
                        'perfilUsu'   => $user["perfilUsu"],
                        'logged' => true,
                    ];
                    $this->session->set($newdata);
                    $this->response->redirect(site_url('home'));
                }else{
                    
                    return redirect()->back()->with('contraseñaInvalida',[
                    'body' => ' Contraseña incorrecta.'
                ]);
                }
            }else{
                return redirect()->back()->with('emailIncorrecto',[
                    'body' => ' Email incorrecto.'
                ]);
            }
        }else{    
            return redirect()->back()->with('sesionYaActiva',[
                    'body' => 'Sesion ya activa !!!'
                ]);
        }
        
        
        
    }

    public function getListar(){
        $data['titulo'] = "Registro - GofI Shop";

        $usuari= new Usuario();
        $datos['usuarioss']= $usuari->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/listar',$datos);
        echo view('front/footer_view');
    }

    public function getBorrarUsuario($id=null){
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back();
            }else{
                $usuario= new Usuario();

                $datos=[
                    'eliminado' => 1
                ];
                
                $usuario->update($id,$datos);
                
                return $this->response->redirect(site_url('/listar'));
            }
        }
    }
    public function getDeletedUsers(){
        $data['titulo'] = "Registro - GofI Shop";

        $usuari= new Usuario();
        $datos['usuarioss']= $usuari->orderBy('id','ASC')->findAll();

        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/usuariosEliminados_view',$datos);
        echo view('front/footer_view');
    }
    
    public function getAltaUsuario($id=null){
        if(!(isset($_SESSION['logged']))){
            return $this->response->redirect(site_url('iniciar'));
        }else{
            if(!(session('perfilUsu') == 1)){
                return redirect()->back();
            }else{
                $usuario= new Usuario();

                $datos=[
                    'eliminado' => 0
                ];
                
                $usuario->update($id,$datos);
                
                return $this->response->redirect(site_url('deletedUsers'));
            }
        }
    }
    public function getEditarUsuario($id=null){
        $data['titulo'] = "Editar PC Escritorio - GofI Shop";

        $usuario= new Usuario();
        $user['array'] = $usuario->find($id);
        
        
        echo view('front/head_view',$data);
        echo view('front/nav_view');
        echo view('front/editarUsuario_view',$user);
        echo view('front/footer_view');
    }
    
    public function getActualizarUsuario(){

        $usuario= new Usuario();
        
        $input = $this->validate([
                'nombr'   => 'required|min_length[3]|max_length[25]',
                'apell' => 'required|min_length[3]|max_length[25]',
                'email'    => 'required|min_length[3]|max_length[100]|valid_email'
            ]);

        if($input){
            $datos=[
                'nombreUsu'   => $this->request->getVar('nombr'),
                'apellidoUsu' => $this->request->getVar('apell'),
                'emailUsu'    => $this->request->getVar('email')
            ];
            
            $id= $this->request->getVar('id');
            $usuario->update($id,$datos);
            
            return redirect()->back()->with('success',[
                'body' => 'Actualizado !!!'
            ]);
            
            
        }else{
            return $this->response->redirect(site_url('listar'));
        }
        

        
    }
    

    public function formValidation() {
        
        if(!(isset($_SESSION['logged'])) || (session('perfilUsu') == 1)){
            $input = $this->validate([
                'nombr'   => 'required|min_length[3]|max_length[25]',
                'apell' => 'required|min_length[3]|max_length[25]',
                'email'    => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.emailUsu]',
                'pass'     => 'required|min_length[4]|max_length[10]'
            ]);
            $formModel = new Usuario();

            if (!$input) {
                $data['titulo'] = "Registro - GofI Shop";
                echo view('front/head_view',$data);
                echo view('front/nav_view');
                echo view('front/registro_view', ['validation' => $this->validator]);
                echo view('front/footer_view');
                
            }else {
                $formModel->save([
                    'nombreUsu'   => $this->request->getVar('nombr'),
                    'apellidoUsu' => $this->request->getVar('apell'),
                    'emailUsu'    => $this->request->getVar('email'),
                    'passwordUsu'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
                ]);  

                return $this->response->redirect(site_url('home'));
            }  
        }else{    
            return redirect()->back()->with('noPuedeRegistrar',[
                    'body' => 'No puede acceder a esta sección, cierre sesion o inicie como administrador !!!'
                ]);
        }
        
    }

    public function getCerrarSesion(){
        if((isset($_SESSION['logged']))){
            $this->session->destroy();
            return $this->response->redirect(site_url('home'));
        }else{
            return redirect()->back()->with('noInicioSesion',[
                    'body' => 'No puede cerrar una sesion que aún no ha iniciado !!!'
                ]);
        }
    }
}