<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories

$routes->get('buscar/(:alphanum)', 'carrito_controller::busqueda/$1');

$routes->get('home', 'Home::index');
$routes->get('productos', 'Home::catálogoProductos');
$routes->get('contacto', 'Home::getContacto');
$routes->get('quienes_somos', 'Home::getAcercaDe');
$routes->get('comercializacion', 'Home::getComercializacion');
$routes->get('terminosUsos', 'Home::getTerminosUsos');

$routes->get('catalogoProductos', 'carrito_controller::ProductosParaUsuarios');
$routes->get('carrito', 'carrito_controller::carroCompra');
$routes->post('carrito_agrega', 'carrito_controller::add');


$routes->get('comprar/(:num)', 'carrito_controller::comprarProductoDirecto/$1');

$routes->get('carrito_actualiza', 'carrito_controller::actualiza_carrito');
$routes->get('muestro', 'carrito_controller::muestra');
$routes->get('borrarCarrito', 'carrito_controller::destroy');
$routes->get('eliminaProducto/(:hash)', 'carrito_controller::borrarProducto/$1');
$routes->get('comprar_carrito', 'Carrito_Controller::comprar_carrito');

$routes->get('restarCantidad/(:hash)', 'Carrito_Controller::restarCantidad/$1');
$routes->get('sumarCantidad/(:hash)', 'Carrito_Controller::sumarCantidad/$1');
$routes->get('listar_compras', 'Ventas_Controllers::listar_compras');

$routes->post('search', 'ComputerController::search');
$routes->post('formAñadirConsulta', 'UsuariosController::consultaUsuario');

$routes->get('cadaProducto/(:num)', 'ComputerController::getCadaProducto/$1');

$routes->get('registro', 'UsuariosController::getRegistrar');
$routes->post('ef', 'UsuariosController::formValidation');

$routes->post('iniciarSes', 'UsuariosController::iniciarUsuario');
$routes->get('cerrarSesion', 'UsuariosController::getCerrarSesion');

$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('listar', 'UsuariosController::getListar');
    $routes->get('borrarUsuario/(:num)', 'UsuariosController::getBorrarUsuario/$1');
    $routes->get('editarUsuario/(:num)', 'UsuariosController::getEditarUsuario/$1');
    $routes->get('deletedUsers', 'UsuariosController::getDeletedUsers');
    $routes->post('enviarFormEdit', 'UsuariosController::getActualizarUsuario');
    $routes->get('altaUsuario/(:num)', 'UsuariosController::getAltaUsuario/$1');
    $routes->post('formAñadirProducto', 'ComputerController::getAñadirProducto');
    $routes->get('listaProductos', 'ComputerController::getListaProducto');
    $routes->get('editarProducto/(:num)', 'ComputerController::getEditarProducto/$1');
    $routes->post('actualizarProducto', 'ComputerController::getActualizarProducto');
    $routes->get('borrarProducto/(:num)', 'ComputerController::getBorrarProducto/$1');
    $routes->get('listaProductosEliminados', 'ComputerController::getEliminarProducto');
    $routes->get('altaProducto/(:num)', 'ComputerController::getAltaProducto/$1');
    $routes->get('enOferta/(:num)', 'ComputerController::enOferta/$1');
    $routes->get('quitarOferta/(:num)', 'ComputerController::quitarOferta/$1');
    $routes->get('productosEnOferta', 'ComputerController::productosEnOferta');
    $routes->get('cargarProductos', 'ComputerController::cargarProducto');
    $routes->get('listar_ventas', 'Ventas_Controllers::listar_ventas');
    $routes->get('listar_consultas', 'UsuariosController::listarConsultas');
    $routes->get('ver_detalles/(:num)', 'Ventas_Controllers::ver_detalles/$1');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}