<div class="container cadaProducto ">
    <div class="row ">
        <div class="col-6 imgProduct">
            <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $array['imagenPC'] ?>" class="imgProducto "
                alt="Imagen ">
        </div>

        <div class="col-6 infoCompra ">
            <div class="row-12 ">
                <h4 class="titleProduct "><?= $array['nombre'] ?></h4>
            </div>

            <div class="separador "></div>

            <div class="row precio ">
                <div class="col-6 precioC ">
                    <p>$<?=$array['precioPC'] ?></p>
                    <div class="row ">
                        <div class="col-12 iconP ">
                            <img src="<?php echo base_url()?>/assets/img/PF.svg " alt="imgPago ">
                            <img src="<?php echo base_url()?>/assets/img/RP.svg " alt="imgPago ">
                        </div>
                    </div>
                </div>
                <div class="col-2 "></div>
                <div class="col-4 finansiation ">
                    <p>12 cuotas sin interes a:</p>
                    <h5>$<?php echo round((($array['precioPC']+($array['precioPC'] * 0.15))/12) , 2);?></h5>
                    <img src="<?php echo base_url()?>/assets/img/MP.svg " alt="imgPago ">
                </div>
            </div>

            <div class="separador "></div>


            <div class="col-12 incluido ">
                <p><img src="<?php echo base_url()?>/assets/img/flecha-derecha.png " alt="iconGarantia "> Garantía</p>
                <p><img src="<?php echo base_url()?>/assets/img/flecha-derecha.png " alt="iconoNike "> 
                    <?php if($array['stock'] > $array['stockMinimo']):?>
                        Stock disponible
                    <?php endif;?>
                </p>
            </div>

            <div class="separador "></div>

            <div class="opcEnvio">
                <p style=" margin: 0%;"><img src="<?php echo base_url()?>/assets/img/enviado.png" width="5%" height="5%"
                        alt="Envios">
                    Envio gratis (Corrientes, Arg.)</p>
                <p style=" margin: 0%;"><img src="<?php echo base_url()?>/assets/img/tiendas.png" width="5%" height="5%"
                        alt="Tienda">
                    Retiralo en la tienda</p>
            </div>

            <div class="separador "></div>



            <div class="row boton " >
                <div class="col-6" style="text-align: center;">
                    <?php if(isset($_SESSION['logged'])){?>
                        <a href="<?php echo base_url('comprar/'. $array['id'] )?>" class="btn btn-outline-success  ">¡ Comprar !</button></a>
                    <?php 
                        }else{ 
                        echo('<button class="btn btn-outline-success" onclick="logIn()" >¡ Comprar !</button>');
                        }
                    ?>
                </div>

                <div class="col-6" style="text-align: center;" >
                    <?php 
                        if(isset($_SESSION['logged'])){
                            helper('form');
                            echo form_open('carrito_agrega');

                            echo form_hidden('id', $array['id']);
                            echo form_hidden('precio', $array['precioPC']);
                            echo form_hidden('nombre', $array['nombre']);
                            echo form_hidden('stock', $array['stock']);
                            echo form_hidden('stockMinimo', $array['stockMinimo']);

                            $btn = array(
                                'class' => 'btn btn-outline-info' ,
                                'value' => 'Al Carrito',
                                'name'  => 'action'
                                );  
                            echo form_submit($btn);
                            echo form_close();
                        }else{
                            echo('<button class="btn btn-outline-info" onclick="logIn()" >Al Carrito</button>');
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <div class="container descripTecnica">
        <div class="descripcionGeneral">

        </div>


            <table class="tabla">
                <thead>
                    <tr>
                        <th>
                            Descripción general
                        </th>
                        <th class="valor">
                            Valor
                        </th>

                    </tr>
                </thead>
                <tr class="impar">
                    <th>Nombre</th>
                    <td class="valor"><?=$array['nombre'] ?></td>

                </tr>
                <tr class="par">
                    <th>Familia Del Procesador</th>
                    <td class="valor"><?=$array['procesador'] ?></td>

                </tr>
                <tr class="impar">
                    <th>Ram</th>
                    <td class="valor"><?=$array['ram'] ?></td>
                </tr>
                
                
                <tr class="par">
                    <th>Almacenamiento</th>
                    <td class="valor"><?=$array['almacenamiento'] ?></td>

                </tr>
                <tr class="impar">
                    <th>Tipo</th>
                    <td class="valor">
                        <?php if($array['tipoDispositivo'] == 1):?>
                            PC
                        <?php elseif ($array['tipoDispositivo'] == 2):?>
                            Laptop
                        <?php endif;?>
                    </td>

                </tr>
            </table>

            <?php if ($array['tipoDispositivo'] == 2):?>
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>
                                Características Físicas
                            </th>
                            <th class="valor">
                                Valor
                            </th>

                        </tr>
                    </thead>
                    <tr class="impar">
                        <th>Tamaño Pantalla</th>
                        <td class="valor"><?=$array['tamañoPantalla'] ?></td>
                    </tr>
                    <tr class="par">
                        <th>Tipo Display</th>
                        <td class="valor"><?=$array['tipoDisplay'] ?></td>
                    </tr>
                    <tr class="impar">
                        <th>Resolución</th>
                        <td class="valor"><?=$array['resolución'] ?></td>
                    </tr>
                    <tr class="par">
                        <th>Touch</th>
                        <td class="valor"><?=$array['touch'] ?></td>
                    </tr>
                </table>
            <?php endif;?>

            <div class="descripcionProducto">
                <b>Descripción del producto</b>
                <br>
                
                <?=$array['descripciónGeneral'] ?>
            </div>
            
      
        
    </div>
</div>