<?php
 
namespace App\Models;

use CodeIgniter\Model;

class VentaDetalle_Model extends Model{

    protected $table      = 'ventas_detalle';
    protected $primaryKey = 'id_ventaDetalle';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['venta_id', 'producto_id',  'cantidad_ventaDetalle','precio_ventaDetalle','total_ventaDetalle'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = ''; 

}