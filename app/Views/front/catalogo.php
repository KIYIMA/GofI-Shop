<form method="post" action="<?php echo(base_url('search')); ?>" class="d-flex busqueda" role="search">
    <input class="form-control w-100 me-2" name="search" type="search" placeholder="Buscar" aria-label="Buscar">
    <button class="btn btn-outline-dark " type="submit">Buscar</button>
</form>

<div class="container  contPro">

    <div class="row rowPro">
        <?php if($productos):?>
        <?php foreach($productos as $producto):?>
        <?php if($producto['eliminado'] == 0):?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 ">
            <div class="card CL ">
                <a href="<?php echo base_url('cadaProducto/'.$producto['id'])?>">
                    <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $producto['imagenPC'] ?>"
                        class="card-img-top" alt="img">
                    <div class="card-body">
                        <h4 class="card-title fontPrice" style="display: flex; justify-content: center;">$<?=
                                $producto['precioPC'] ?>
                        </h4>
                        <p class="card-text fontDescription">
                            <?= $producto['descripciónGeneral'] ?>
                        </p>
                    </div>
                </a>
                <div class="card-footer">


                    <?php if(isset($_SESSION['logged'])):?>

                    <form method="post" action="carrito_agrega/<?= $producto['id'] ?>">
                        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                        <input type="hidden" name="precio" value="<?= $producto['precioPC'] ?>">
                        <input type="hidden" name="nombre" value="<?= $producto['nombre'] ?>">
                        <input type="hidden" name="stock" value="<?= $producto['stock'] ?>">
                        <input type="hidden" name="stockMinimo" value="<?= $producto['stockMinimo'] ?>">
                        <div class="btnS">
                            <button type="submit" class="btn btn-outline-success "><img
                                    src="<?php echo base_url()?>/assets/img/anadir-al-carrito.png" width="25"
                                    alt=""></button>
                        </div>
                    </form>

                    <?php  else:?>
                    <button class="btn btn-outline-success" onclick="logIn()"><img
                            src="<?php echo base_url()?>/assets/img/anadir-al-carrito.png" width="25" alt=""></button>
                    <?php endif ;?>

                </div>
            </div>



        </div>

        <?php endif;?>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>