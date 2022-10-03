<div class="container catalogoProductos">

    <?php if($productos):?>
    <?php foreach($productos as $producto):?>
        <?php if($producto['eliminado'] == 0):?>
    <div class="card CL h-auto " style="min-width: 170px; max-width:320px;">
        <a href="<?php echo base_url('cadaProducto/'.$producto['id'])?>">
            <img src="<?php echo base_url()?>/assets/uploads/imgProductos/<?= $producto['imagenPC'] ?>"
                class="card-img-top" alt="img">
            <div class="card-body">
                <h4 class="card-title">$<?= $producto['precioPC'] ?></h4>
                <p class="card-text"><?= $producto['descripciónGeneral'] ?></p>
            </div>
        </a>
        <div class="card-footer" style="text-align: center;">
            
            <?php 
                
                if(isset($_SESSION['logged'])){
                    helper('form');
                    echo form_open('carrito_agrega');

                    echo form_hidden('id', $producto['id']);
                    echo form_hidden('precio', $producto['precioPC']);
                    echo form_hidden('nombre', $producto['nombre']);
                    echo form_hidden('stock', $producto['stock']);
                    echo form_hidden('stockMinimo', $producto['stockMinimo']);

                    $btn = array(
                        'class' => 'btn btn-success fuenteBotones' ,
                        'value' => 'Al Carrito',
                        'name'  => 'action'
                        );  
                    echo form_submit($btn);
                    echo form_close();
               }else{
                    echo('<button class="btn btn-success" onclick="logIn()" >Al Carrito</button>');
                }
            ?>

        </div>
    </div>
        <?php endif;?>
    <?php endforeach; ?>
    <?php endif;?>


</div>