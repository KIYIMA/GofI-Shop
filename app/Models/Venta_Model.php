<?php
 
namespace App\Models;

use CodeIgniter\Model;

class Venta_Model extends Model
{
    protected $table      = 'ventas';
    protected $primaryKey = 'id_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['fecha_venta', 'usuario_id','total_venta' ];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = ''; 

}