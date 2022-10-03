<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function checkUser($email, $password)  
    {   

        $hash = $this->Usuario->where('emailUsu',$email)
        ->findColumn('passwordUsu');

        return password_verify($password,$hash[0]);


    }
    public function before(RequestInterface $request, $arguments = null)
    {
        //Evita que un usuario con session activa acceda a datos que solo puede acceder un administrador.
        if((session()->logged) && (!(session()->perfilUsu == 1))){
            return redirect()->back()->with('cerrarEIngresarComoAdmin',[
                'body' => 'ingresar como administrador !!!'
            ]);
        }
        //Evita que un usuario sin session activa acceda a datos que solo puede acceder un administrador.
        if(!(session()->perfilUsu == 1)){
                return redirect()->back()->with('registrarComoAdmin',[
                    'body' => ' como administrador.'
                ]);
            }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}