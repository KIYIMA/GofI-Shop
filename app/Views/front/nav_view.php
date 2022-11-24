<nav class="navbar navbar-expand-lg navbar-dark" >
    <div class="container-fluid">
        <a class="navbar-brand h-100" style="color: aliceblue;" href="<?php echo base_url('home'); ?>"><img
                src="<?php echo base_url('./assets/img/IconSG.png') ?>" style="height: 50px;" alt="Logo"> GofI Shop</a>

        <button class="navbar-toggler" style="border-color: white ;" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav men mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" style="color: aliceblue;" aria-current="page"
                        href="<?php echo base_url('home'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hov" style="color: aliceblue;"
                        href="<?php echo base_url('catalogoProductos'); ?>">Productos</a>
                </li>
                <?php if (session('logged') && (session('perfilUsu') == 1)): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Administrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="nav-item">
                            <a class="dropdown-item" href="<?php echo base_url('listar'); ?>">Usuarios</a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('listaProductos'); ?>">Productos</a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('listar_ventas'); ?>">Ventas</a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('listar_consultas'); ?>">Consultas</a>
                        </li>
                    </ul>
                </li>
                <?php endif ?>



                <li class="nav-item">
                    <a class="nav-link hov" style="color: aliceblue;"
                        href="<?php echo base_url('comercializacion'); ?>">Comercialización</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Nosotros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url('contacto'); ?>">Contacto</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('quienes_somos'); ?>">Quienes somos</a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('terminosUsos'); ?>">Términos y
                                condiciones</a></li>
                    </ul>
                </li>

            </ul>




            <nav class="navbar-nav navDos ml-auto h-100">

                <?php if ((session('logged'))): ?>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo (session('nombreUsu')); ?>

                    </a>
                    <ul class="dropdown-menu w-50" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="<?php echo base_url('cerrarSesion'); ?>">Salir</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('listar_compras'); ?>">Compras</a></li>
                    </ul>
                </li>
                <div>
                    <ul style="padding:0%; margin:0%; width:auto; ">
                        <li class="nav-item">
                            <a href="<?php echo base_url(''); ?>/carrito" class="">
                                <img src="<?php echo base_url(''); ?>/assets/img/2345.png" alt="" width="35">
                            </a>

                        </li>
                    </ul>
                </div>


                <?php else: ?>

                <?php $validation = \Config\Services::validation(); ?>

                <!-- Button trigger modal -->
                <div class="styleModal">
                    <div class="navDos">
                        <div class="btnDarkWhite" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Iniciar Sesion
                        </div>
                    </div>


                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="<?php echo base_url('iniciarSes') ?>" class="formulario "
                                    style=" padding: 1%;margin:auto; margin-top: 5%;
                        margin-bottom: 5%; ">

                                    <div class="col-md-12">
                                        <h3 style="text-align: center;">Iniciar Sesion</h3>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputEmail4" class="form-label">Email</label>
                                        <input type="email" name="emailI" class="form-control" id="inputEmail4">
                                    </div>
                                    <!-- Error -->
                                    <?php if ($validation->getError('emailI')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error=$validation->getError('emailI'); ?>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <label for="inputPassword4" class="form-label">Password</label>
                                        <input type="password" name="passI" class="form-control" id="inputPassword4">
                                    </div>
                                    <!-- Error -->
                                    <?php if ($validation->getError('passI')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error=$validation->getError('passI'); ?>
                                    </div>
                         } ?>
           <?php }?>

                                    <div class="col-12 " style="text-align: center; margin:1%;">
                                        <button id="iniciar" type="submit" class="btn  btn-success">Iniciar</button>
                                        <input type="reset" value="Cancelar" class=" btn btn-danger">
                                    </div>
                                    <div class="TieneCuenta col-12 " style="text-align: center;">
                                        <a href="<?php echo base_url('registro'); ?>">No tienes cuenta?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <?php endif; ?>

            </nav>



        </div>

    </div>
</nav>

<?php if (session('cerrarEIngresarComoAdmin')): ?>
<div class="alert alert-warning" role="alert">
    <a href="<?php echo base_url('cerrarSesion'); ?>" class="alert-link">cerrar
        sesion </a>e <?= session('cerrarEIngresarComoAdmin.body') ?>
</div>
<?php endif ?>

<?php if (session('registroExitoso')): ?>
<script>
    Swal.fire({
        type: 'success',
        title: 'Registrado con exito !!!',
        confirmButtonText: 'Aceptar'
    });
</script>
<?php endif ?>

<?php if (session('registrarComoAdmin')): ?>
<div class="alert alert-warning" role="alert">
    <span>Iniciar sesion como administrador!!! </span>
</div>
<?php endif ?>

<?php if (session('noHayImagen')): ?>
<div class="alert alert-warning" role="alert">
    <?= session('noHayImagen.body') ?>
</div>
<?php endif ?>

<?php if (session('actualizadoSI')): ?>
<div class="alert alert-warning" role="alert">
    <?= session('actualizadoSI.body') ?>
</div>
<?php endif ?>

<?php if (session('sesionYaActiva')): ?>
<div class="alert alert-warning" role="alert">
    <?= session('sesionYaActiva.body') ?>
</div>
<?php endif ?>

<?php if (session('noPuedeRegistrar')): ?>
<div class="alert alert-warning" role="alert">
    <?= session('noPuedeRegistrar.body') ?>
</div>
<?php endif ?>

<?php if (session('usuarioActualizado')): ?>
<script>
    alert('usuarioActualizado.body');
</script>
<?php endif ?>

<?php if (session('contraseñaInvalida')): ?>
<div class="alert alert-danger" role="alert">
    <?= session('contraseñaInvalida.body') ?>
</div>
<?php endif ?>

<?php if (session('emailIncorrecto')): ?>
<div class="alert alert-danger" role="alert">
    <?= session('emailIncorrecto.body') ?>
</div>
<?php endif ?>

<?php if (session('success')): ?>
<div class="alert alert-success" role="alert">
    <?= session('success.body') ?>
</div>
<?php endif ?>
<?php if (session('warning')): ?>
<div class="alert alert-warning" role="alert">
    <?= session('warning.body') ?>
</div>
<?php endif ?>
<?php if (session('successfaild')): ?>
<div class="alert alert-danger" role="alert">
    <?= session('successfaild.body') ?>
</div>
<?php endif ?>