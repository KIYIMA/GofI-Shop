<?php $validation = \Config\Services::validation(); ?>

<form method="post" action="<?=site_url('formAñadirProducto')?>" enctype="multipart/form-data"
    class=" formProducto row g-3 h-auto"
    style="border-radius: 5px; background-color: grey; padding: 1%; margin: auto; margin-top: 5%; margin-bottom: 5%;">

    <div class="col-md-12">
        <h3 style="text-align: center;">Cargar producto</h3>
    </div>


    <div class="col-md-12">
        <label for="tipoDispositivo">Elige el tipo de dispositivo</label>
        <select id="tipoDispositivo" name="tipoDispositivo" class="form-select" aria-label="Default select example">
          <option value="1">PC</option>
          <option value="2">Laptop</option>
        </select>
    </div>


    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('nombre')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('nombre'); ?>
    </div>
    <?php }?>
    
    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Procesador</label>
        <input type="text" name="procesador" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('procesador')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('procesador'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Ram</label>
        <input type="text" name="ram" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('ram')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('ram'); ?>
    </div>
    <?php }?>

    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Almacenamiento</label>
        <input type="text" name="almacenamiento" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('almacenamiento')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('almacenamiento'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Tamaño de pantalla</label>
        <input type="text" name="tamañoPantalla" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('tamañoPantalla')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('tamañoPantalla'); ?>
    </div>
    <?php }?>

    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Tipo de Display</label>
        <input type="text" name="tipoDisplay" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('tipoDisplay')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('tipoDisplay'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Resolución</label>
        <input type="text" name="resolución" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('resolución')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('resolución'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputmodelo" class="form-label">Touch</label>
        <input type="text" name="touch" class="form-control" id="inputmodelo">
    </div>
    <!-- Error -->
    <?php if($validation->getError('touch')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('touch'); ?>
    </div>
    <?php }?>

    <div class="col-md-12">
        <label for="inputmodelo" class="form-label">Descripción (En detalle)</label>
        <textarea class="form-control" name="descripciónGeneral" placeholder="Todos los detalles posibles del producto" id="floatingTextarea2" ></textarea>
    </div>
    <!-- Error -->
    <?php if($validation->getError('descripciónGeneral')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('descripciónGeneral'); ?>
    </div>
    <?php }?>

    <div class="col-md-6">
        <label for="inputcantidad" class="form-label">Cantidad</label>
        <input name="stock" type="text" class="form-control" id="inputcantidad">
    </div>
    <!-- Error -->
    <?php if($validation->getError('stock')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('stock'); ?>
    </div>
    <?php }?>
    <div class="col-md-6">
        <label for="inputprecio" class="form-label">Precio Compra</label>
        <input name="precioCompra" type="text" class="form-control" id="inputprecio">
    </div>
    <!-- Error -->
    <?php if($validation->getError('precioCompra')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('precioCompra'); ?>
    </div>
    <?php }?>
    <div class="col-md-6">
        <label for="inputprecio" class="form-label">Precio venta</label>
        <input name="precioPC" type="text" class="form-control" id="inputprecio">
    </div>
    <!-- Error -->
    <?php if($validation->getError('precioPC')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('precioPC'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputimagen" class="form-label">Imagen</label>
        <input type="file" name="imagen" class="form-control" id="inputimagen">
    </div>
    <div class="col-12" style="text-align: center;">
        <button type="submit" onclick="registr()" class="btn btn-dark BtnIniRegi">Añadir</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
    </div>
</form>