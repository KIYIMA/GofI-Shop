<?php $validation = \Config\Services::validation(); ?>

<form method="post" action="<?=site_url('actualizarProducto')?>" enctype="multipart/form-data"
    class="formulario iniRegis row g-3 h-auto"
    style="border-radius: 5px; background-color: grey; padding: 1%; margin: auto; margin-top: 5%; margin-bottom: 5%;">

    <div class="col-md-12">
        <h3 style="text-align: center;">Editar portatil</h3>
    </div>

    <input type="hidden" name="id" value="<?=$array['id']?>">

    <div class="col-md-12">
        <label for="tipoDispositivo">Elige el tipo de dispositivo</label>
        <select id="tipoDispositivo" name="tipoDispositivo" class="form-select" aria-label="Default select example">
            <option selected><?=$array['tipoDispositivo'];?></option>
            <option value="1">PC</option>
            <option value="2">Laptop</option>
        </select>
    </div>

    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Nombre</label>
        <input type="text" value="<?=$array['nombre'];?>" name="nombre" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('nombre')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('nombre'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Descripción</label>
        <input type="text" value="<?=$array['descripciónGeneral'];?>" name="descripciónGeneral" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('descripciónGeneral')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('descripciónGeneral'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Procesador</label>
        <input type="text" value="<?=$array['procesador'];?>" name="procesador" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('procesador')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('procesador'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Ram</label>
        <input type="text" value="<?=$array['ram'];?>" name="ram" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('ram')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('ram'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Placa madre</label>
        <input type="text" value="<?=$array['placaMadre'];?>" name="placaMadre" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('placaMadre')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('placaMadre'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Canales de memoria</label>
        <input type="text" value="<?=$array['cantidadCanalMemoria'];?>" name="cantidadCanalMemoria" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('cantidadCanalMemoria')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('cantidadCanalMemoria'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Almacenamiento</label>
        <input type="text" value="<?=$array['almacenamiento'];?>" name="almacenamiento" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('almacenamiento')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('almacenamiento'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Gráfica</label>
        <input type="text" value="<?=$array['gráfica'];?>" name="gráfica" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('gráfica')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('gráfica'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto HDMI</label>
        <input type="text" value="<?=$array['puertosHdmi'];?>" name="puertosHdmi" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertosHdmi')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertosHdmi'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto HDMI Mini</label>
        <input type="text" value="<?=$array['puertosHdmiMini'];?>" name="puertosHdmiMini" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertosHdmiMini')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertosHdmiMini'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto USB 2.0</label>
        <input type="text" value="<?=$array['puertoUsb2'];?>" name="puertoUsb2" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertoUsb2')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertoUsb2'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto USB 3.0</label>
        <input type="text" value="<?=$array['puertoUsb3'];?>" name="puertoUsb3" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertoUsb3')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertoUsb3'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto USB 3.1 A</label>
        <input type="text" value="<?=$array['puertoUsb31'];?>" name="puertoUsb31" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertoUsb31')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertoUsb31'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto USB 3.1 C</label>
        <input type="text" value="<?=$array['puertoUsb31C'];?>" name="puertoUsb31C" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertoUsb31C')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertoUsb31C'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Bluetooth</label>
        <input type="text" value="<?=$array['bluetooth'];?>" name="bluetooth" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('bluetooth')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('bluetooth'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Wifi</label>
        <input type="text" value="<?=$array['wifi'];?>" name="wifi" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('wifi')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('wifi'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Puerto Ethernet</label>
        <input type="text" value="<?=$array['puertoEthernet'];?>" name="puertoEthernet" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('puertoEthernet')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('puertoEthernet'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Peso</label>
        <input type="text" value="<?=$array['peso'];?>" name="peso" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('peso')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('peso'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Ancho</label>
        <input type="text" value="<?=$array['ancho'];?>" name="ancho" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('ancho')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('ancho'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Profundidad</label>
        <input type="text" value="<?=$array['profundidad'];?>" name="profundidad" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('profundidad')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('profundidad'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">alto</label>
        <input type="text" value="<?=$array['alto'];?>" name="alto" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('alto')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('alto'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Tamaño de pantalla</label>
        <input type="text" value="<?=$array['tamañoPantalla'];?>" name="tamañoPantalla" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('tamañoPantalla')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('tamañoPantalla'); ?>
    </div>
    <?php }?>

    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Tipo de Display</label>
        <input type="text" value="<?=$array['tipoDisplay'];?>" name="tipoDisplay" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('tipoDisplay')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('tipoDisplay'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Resolución</label>
        <input type="text" value="<?=$array['resolución'];?>" name="resolución" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('resolución')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('resolución'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Touch</label>
        <input type="text" value="<?=$array['touch'];?>" name="touch" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('touch')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('touch'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Frecuencia de Refresco </label>
        <input type="text" value="<?=$array['frecuenciaRefresco'];?>" name="frecuenciaRefresco" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('frecuenciaRefresco')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('frecuenciaRefresco'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Lectora DVD</label>
        <input type="text" value="<?=$array['lectoraDvd'];?>" name="lectoraDvd" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('lectoraDvd')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('lectoraDvd'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Teclado Luminoso</label>
        <input type="text" value="<?=$array['tecladoLuminoso'];?>" name="tecladoLuminoso" class="form-control"
            id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('tecladoLuminoso')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('tecladoLuminoso'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Pad numérico</label>
        <input type="text" value="<?=$array['padNumérico'];?>" name="padNumérico" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('padNumérico')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('padNumérico'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Web cam</label>
        <input type="text" value="<?=$array['webCam'];?>" name="webCam" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('webCam')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('webCam'); ?>
    </div>
    <?php }?>
    <div class="col-md-6">
        <label for="inputcantidad" class="form-label">Stock</label>
        <input name="stock" value="<?=$array['stock'];?>" type="text" class="form-control" id="inputcantidad">
    </div>
    <!-- Error -->
    <?php if($validation->getError('stock')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('stock'); ?>
    </div>
    <?php }?>
    <div class="col-md-6">
        <label for="inputprecio" class="form-label">Precio Compra</label>
        <input name="precioCompra" value="<?=$array['precioCompra'];?>" type="text" class="form-control" id="inputprecio">
    </div>
    <!-- Error -->
    <?php if($validation->getError('precioCompra')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('precioCompra'); ?>
    </div>
    <?php }?>
    <div class="col-md-6">
        <label for="inputprecio" class="form-label">Precio</label>
        <input name="precioPC" value="<?=$array['precioPC'];?>" type="text" class="form-control" id="inputprecio">
    </div>
    <!-- Error -->
    <?php if($validation->getError('precioPC')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('precioPC'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputimagen" class="form-label">Imagen</label>
        <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $array['imagenPC'] ?>" class="card-img-top"
            alt="img">
        <input type="file" name="imagen" class="form-control" id="inputimagen">
    </div>

    <div class="col-12" style="text-align: center;">
        <button type="submit" class="btn btn-success ">Guardar</button>
        <a href="<?php echo base_url('listaProductos')?>" class="btn btn-danger">Volver</a>
    </div>


</form>