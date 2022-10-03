<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];
    public $consulta = [
        'email'  => 'required|min_length[4]|max_length[100]|valid_email',
        'consulta'   => 'required|min_length[8]'
    ];
    public $usuario = [
        'nombr'  => 'required|min_length[3]',
        'apell'  => 'required|min_length[3]|max_length[25]',
        'email'  => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.emailUsu]',
        'pass'   => 'required|min_length[3]|max_length[10]'
    ];
    public $editUsuario = [
        'nombr'  => 'required|min_length[3]',
        'apell'  => 'required|min_length[3]|max_length[25]',
        'email'  => 'required|min_length[4]|max_length[100]|valid_email'
    ];
    public $inicioSesion = [
        'emailI'   => 'required|min_length[4]|max_length[100]|valid_email',
        'passI'    => 'required|min_length[3]',
    ];
    
    public $producto = [
        'nombre'               => 'required',
        'descripciónGeneral'  => 'required|min_length[3]',
        'procesador'          => 'required|min_length[5]',
        'ram'                 => 'required',
        
        'almacenamiento'      => 'required',
        
        'tamañoPantalla'      => 'required',
        'tipoDisplay'         => 'required',
        'resolución'          => 'required',
        'touch'               => 'required',
        
        'tipoDispositivo'     => 'required',
        'stock'               => 'required',
        'precioCompra'        => 'required',
        'precioPC'            => 'required',
    ];
    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}