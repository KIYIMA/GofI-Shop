<?php $validation = \Config\Services::validation(); ?>


<form method="post" action="<?=site_url('enviarFormEdit')?>" enctype="multipart/form-data"
    class="formulario iniRegis row g-3 h-auto"
    style="border-radius: 5px; background-color: grey; padding: 1%; margin: auto; margin-top: 5%; margin-bottom: 5%;">

    <div class="col-md-12">
        <h3 style="text-align: center;">Editar datos de Usuario</h3>
    </div>
    <input type="text" hidden="0" value="<?=$array['id'];?>" name="id" class="form-control">
    <div class="col-md-6">
        <label for="inputNombre" class="form-label">Nombre/s</label>
        <input type="text" value="<?=$array['nombreUsu'];?>" name="nombr" class="form-control" id="inputNombre">
        <!-- Error -->
        <?php if($validation->getError('nombr')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombr'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-6">
        <label for="inputApellido" class="form-label">Apellido/s</label>
        <input name="apell" value="<?=$array['apellidoUsu'];?>" type="text" class="form-control" id="inputApellido">
        <!-- Error -->
        <?php if($validation->getError('apell')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('apell'); ?>
        </div>
        <?php }?>
    </div>
    <div class="col-md-12">
        <label for="inputEmail1" class="form-label">Email</label>
        <input type="email" value="<?=$array['emailUsu'];?>" name="email" class="form-control" id="inputEmail1">
        <!-- Error -->
        <?php if($validation->getError('email')) {?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('email'); ?>
        </div>
        <?php }?>
    </div>

    <div class="col-12" style="text-align: center;">
        <button type="submit" class="btn btn-success ">Guardar</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
    </div>
</form>