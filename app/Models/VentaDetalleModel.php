<?php
 
namespace App\Models;

use CodeIgniter\Model;

class VentaDetalleModel extends Model
{
    protected $table      = 'ventas_detalle';
    protected $primaryKey = 'id_ventaDetalle';
    
    protected $allowedFields = ['venta_id', 'producto_id',  'cantidad_ventaDetalle','precio_ventaDetalle','total_ventaDetalle'];


}