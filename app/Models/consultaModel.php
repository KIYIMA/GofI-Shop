<?php
namespace App\Models;

use CodeIgniter\Model;

class consultaModel extends Model{
    protected $table = 'tableConsults';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['id_usuario','email_consulta','consulta','fecha_consulta'];

    
}