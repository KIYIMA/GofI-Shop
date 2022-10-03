<!doctype html>
<html lang="en">

<!-- 796657 -->

<body>

    <form method="get" action="<?=site_url('buscar')?>" class="d-flex busqueda" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-dark" type="submit">Buscar</button>
    </form>

    <main>

        <div id="carouselExampleCaptions" class="carousel slide" style="height: auto; margin: auto; padding-top: 1%;"
            data-bs-ride="carousel">
            <div class="carousel-indicators  ">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner d-flex" style="">
                <div class="carousel-item active ">
                    <img src="./assets/img/ImgCaroucel2.png" class=" img-fluid" alt="fondoWeb">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Carro3.png" class="img-fluid" alt="FondoD">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Caroucel3.png" class=" img-fluid" alt="fondoE">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="container principal">
            <div class="PCs">

                <div class="row" style="">

                    <div class="col-12">
                        <h5 style="margin-bottom: 10px; margin-top: 15px;">Ofertas</h5>
                    </div>
                    <?php foreach($productos as $e):?>
                        <?php if($e['enOferta'] == 1 && $e['eliminado'] != 1):?>
                            <div class="col-4 col1">
                                <div class="card CL h-auto" style="min-width: 100%;">
                                    <a href="<?php echo base_url('cadaProducto/'.$e['id'])?>">
                                        <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $e['imagenPC'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">$ <?php echo($e['precioPC'])?></h5>
                                            <p class="card-text"><?php echo($e['descripciónGeneral'])?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endif;?>
                        <?php endforeach;?>

                </div>
            </div>


            <div class="PCEscritorio" style="margin-top: 5%; margin-bottom: 20px;">

                <div class="row" style="">
                    <div class="col-12">
                        <h4>Computadoras de Escritorio</h4>
                    </div>
                    
                    <?php
                    $cont = 0;
                    foreach($productos as $e):
                    
                    ?>
                    
                        <?php 
                            if($e['tipoDispositivo'] == 1 && $cont <= 2):
                        ?>
                            <div class="col-4 col1 ">
                                <div class="card CL h-100" style="min-width: 100%;">
                                    <a href="<?php echo base_url('cadaProducto/'.$e['id'])?>">
                                        <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $e['imagenPC'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">$ <?php echo($e['precioPC'])?></h5>
                                            <p class="card-text"><?php echo($e['descripciónGeneral'])?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php 
                            $cont++;
                            endif;
                        ?>
                    <?php 
                        endforeach;
                    ?>

                </div>
            </div>

            <div class="Laptops" style="margin-top: 5%; margin-bottom: 20px;">

                <div class="row" style="">
                    <div class="col-12">
                        <h4>Portátiles</h4>
                    </div>
                    
                    <?php 
                        $cont = 0;
                        foreach($productos as $e):
                    ?>
                        <?php 
                            if($e['tipoDispositivo'] == 2 && $cont <= 2):
                        ?>
                            <div class="col-4 col1">
                                <div class="card CL h-100" style="min-width: 100%;">
                                    <a href="<?php echo base_url('cadaProducto/'.$e['id'])?>">
                                        <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $e['imagenPC'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">$ <?php echo($e['precioPC'])?></h5>
                                            <p class="card-text"  ><?php echo($e['descripciónGeneral'])?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php 
                            $cont++;
                            endif;
                        ?>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </main>

</body>
<html>