<?php $validation = \Config\Services::validation(); ?>

<div class=" contacto  h-auto " style="border-radius: 5px;margin: auto; margin-top: 1%; margin-bottom: 1%;">
    <div class="consulta">
        <h3>Envianos tu consuta</h3>
        <form method="post" action="<?=site_url('formAñadirConsulta')?>" enctype="multipart/form-data"
     class="form-floating ">
            <div class="form">
                <input type="email" class="form-control" name="email" id="floatingInputValue" placeholder="name@example.com">
                <label for="floatingInputValue"></label>
            </div>
            <!-- Error -->
            <?php if($validation->getError('email')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('email'); ?>
            </div>
            <?php }?>

            <div class="formDescription ">
                <textarea class="form-control" name="consulta" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100%"></textarea>
                <label for="floatingTextarea2"></label>
            </div>
            <!-- Error -->
            <?php if($validation->getError('consulta')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('consulta'); ?>
            </div>
            <?php }?>

            <div class="col-12" style="text-align: center;">
                <button type="submit" onclick="envConsult()" class="btn btn-outline-dark">Enviar</button>
                <input type="reset" value="Cancelar" class="btn btn-outline-danger">
            </div>
        </form>
    </div>
    <div class="row contactanos">
        <h4><b>Contactanos</b></h4>
        <div class="col-4 ">
            <h6 style=" word-break: break-all;"><img src="./assets/img/correo.png" width="25px;" alt="Correo.">
                GofIShop@gmail.com</h6>
            <h6><img src="./assets/img/telefono.png" width="25px;" alt="Tel."> 379-4887799</h6>
            <h6><img src="./assets/img/whatsapp.png" width="25px;" alt="Whatsapp."> 379-4887799</h6>
        </div>
        <div class="col-4">
            <h6><img src="./assets/img/direccion.png" width="25px;" alt="direccion."> Junin 1500</h6>
            <a href="http://localhost/MyProyect/" style=" word-break: break-all; color: black; "><img
                    src="./assets/img/mundo.png" width="25px;" alt="direccion."> www.GofIShop.com.ar</a>
        </div>
        <div class="col-4 maps">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.035491082722!2d-58.83392838416711!3d-27.468154423215204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca0e1c4b807%3A0xde093295071d103c!2sJunin%201500%2C%20W3400AWG%20Corrientes!5e0!3m2!1ses!2sar!4v1650637528560!5m2!1ses!2sar"
                width="100%" height="100%" style="" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>