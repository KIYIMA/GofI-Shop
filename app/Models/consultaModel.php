<?php
namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['id_usuario','email_consulta','consulta','fecha_consulta'];

    
}