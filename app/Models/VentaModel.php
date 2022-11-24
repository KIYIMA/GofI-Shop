<?php
 
namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model{

    protected $table      = 'venta';
    protected $primaryKey = 'venta_id';
    protected $allowedFields = ['fecha_venta', 'compra_id','total_venta' ];
}