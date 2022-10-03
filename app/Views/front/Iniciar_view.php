<?php $validation = \Config\Services::validation(); ?>

<form method="post" action="<?php echo base_url('iniciarSes')?>" class="formulario iniRegis row g-3 h-auto" style=" padding: 1%;margin:auto; margin-top: 5%;
    margin-bottom: 5%; ">

    <div class="col-md-12">
        <h3 style="text-align: center;">Iniciar Sesion</h3>
    </div>
    
    <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="emailI" class="form-control" id="inputEmail4">
    </div>
    <!-- Error -->
    <?php if($validation->getError('emailI')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('emailI'); ?>
    </div>
    <?php }?>
    <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="passI" class="form-control" id="inputPassword4">
    </div>
    <!-- Error -->
    <?php if($validation->getError('passI')) {?>
    <div class='alert alert-danger mt-2'>
        <?= $error = $validation->getError('passI'); ?>
    </div>
    <?php }?>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
        </div>
    </div>
    <div class="col-12 " style="text-align: center;">
        <button id="iniciar" type="submit" class="btn btn-dark BtnIniRegi">Iniciar</button>
        <input type="reset" value="Cancelar" class="btn btn-danger">
    </div>
    <div class="TieneCuenta col-12 " style="text-align: center;">
        <a href="<?php echo base_url('registro'); ?>">No tienes cuenta?</a>
    </div>
</form>