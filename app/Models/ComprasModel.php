<?php
namespace App\Models;

use CodeIgniter\Model;

class ComprasModel extends Model{
    protected $table = 'compras';
    protected $primaryKey = 'compras_id';
    protected $allowedFields = ['compra_fecha','compra_producto_id','compra_usuario_id', 'compra_cantidad','compra_subtotal'];

    
}