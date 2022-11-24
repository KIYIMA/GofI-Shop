<div class="Container listaProductos">
    <h3 class="card-title" style="padding-top:1%;">Carrito de compras - <b>GofI Shop</b></h3>

    <table id="example" class="display responsive nowrap" style="width:100%" >
        
        
            <thead>
                <tr class="table-active">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acción</th>
                    <th scope="col">Borrar</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    $gran_total = 0;
                    $i = 1;
                    

                    foreach($carro as $carrito):?>

                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $carrito['nombre']; ?> </td>
                        <td> <?php echo ($carrito['subtotal'] ); ?></td>
                        <td> <?php echo $carrito['cantidad']; ?></td>
                        <?php 
                            $gran_total = $gran_total + $carrito['subtotal']; 
                        ?>
                        <td>
                            <a href="<?=site_url('restarCantidad/'.$carrito['carrito_id'])?>">
                                <img src="<?=site_url("assets/img/restarCarrito.png")?>" style="width: 25px;"></img>
                            </a>
                            
                            <a href="<?=site_url('sumarCantidad/'.$carrito['carrito_id'])?>">
                                <img src="<?=site_url("assets/img/agregarCarrito.png")?>" style="width: 25px;"></img>
                            </a>
                        </td>
                        <td>
                            <a href="<?=site_url('eliminaProducto/'.$carrito['carrito_id'])?>">Eliminar</a>
                        </td>
                        <td>$<?php echo ($carrito['subtotal']); ?></td>
                    </tr>
                    
                
                <?php endforeach; ?>
            </tbody>
            <p><h4>Total de la Compra: $<strong><?php echo number_format($gran_total, 2); ?></strong></h4></p>
        
        
    </table>
    
    
    
    <br>
    <div class="botones">
        <a href="catalogoProductos"  class="btn btn-info m-1">Agregar productos</a>
        <?php 
                if($carro){
                    echo ('<a href='.'"borrarCarrito"'. 'class=' . '"btn btn-danger m-1"' .'>Eliminar</a>');
                    echo ('<a href='.'"comprar_carrito"' . 'class=' . '"btn btn-success m-1"' .'>Confirmar compra</a>');
                }
            ?>
    </div>
</div>