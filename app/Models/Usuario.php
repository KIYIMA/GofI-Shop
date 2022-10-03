<?php
namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombreUsu','apellidoUsu','passwordUsu','emailUsu','eliminado','perfilUsu'];

    public function login($datos){
        $sql = "SELECT * FROM usuarios WHERE emailUsu = '".$datos['email']."' AND passwordUsu = '".$datos['pass']."'";
        return ($this->ExecuteArrayResults($sql));
    }
    public function getUserBy(string $column, string $value){
        return $this->where($column, $value)->first();
    }
}