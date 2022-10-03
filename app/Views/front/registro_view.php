<?php $validation = \Config\Services::validation(); ?>


<form method="post" action="<?=site_url('ef')?>" enctype="multipart/form-data"
    class="formulario formRegistro row g-3 h-auto"
    style="border-radius: 5px; background-color: grey; padding: 1%; margin: auto; margin-top: 5%; margin-bottom: 5%;">

    <div class="col-md-12">
        <h3 style="text-align: center;">Registrarse</h3>
    </div>
    <div class="col-md-6">
        <label for="inputNombre" class="form-label">Nombre/s</label>
        <input type="text" name="nombr" class="form-control" id="inputNombre">
        <!-- Error -->
        <?php if($validation->getError('nombr')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombr'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-6">
        <label for="inputApellido" class="form-label">Apellido/s</label>
        <input name="apell" type="text" class="form-control" id="inputApellido">
        <!-- Error -->
        <?php if($validation->getError('apell')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('apell'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-6">
        <label for="inputPassword1" class="form-label">Password</label>
        <input name="pass" type="password" class="form-control" id="inputPassword1">
        <!-- Error -->
        <?php if($validation->getError('pass')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('pass'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-6">
        <label for="inputPassword2" name="passConfir" class="form-label">Confirmar Password</label>
        <input type="password" class="form-control" id="inputPassword2">
    </div>
    <div class="col-md-12">
        <label for="inputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail1">
        <!-- Error -->
        <?php if($validation->getError('email')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('email'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-12">
        <label for="inputEmail2" name="emailConfir" class="form-label">Confirmar Email</label>
        <input type="email" class="form-control" id="inputEmail2">
    </div>

    <div class="col-12" style="text-align: center;">
        <button type="submit" onclick="registr()" class="btn btn-dark BtnIniRegi">Registrar</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
    </div>
    
</form>