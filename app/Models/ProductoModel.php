<?php
namespace App\Models;

use CodeIgniter\Model;

class productoModel extends Model{
    protected $table = 'productos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','descripciónGeneral','procesador','ram','placaMadre','cantidadCanalMemoria','almacenamiento','gráfica','puertosHdmi','puertosHdmiMini','puertoUsb2','puertoUsb3','puertoUsb31','puertoUsb31C','bluetooth','wifi','puertoEthernet','peso','ancho','profundidad','alto','tamañoPantalla','tipoDisplay','resolución','touch','frecuenciaRefresco','lectoraDvd','tecladoLuminoso','padNumérico','webCam','stock','stockMinimo','eliminado','enOferta','tipoDispositivo', 'tipoCarga','precioCompra','precioPC','imagenPC'];
}