<div class="Container listaProductos">
    <h3 class="card-title" style="padding-top:1%;">Carrito de compras - <b>GofI Shop</b></h3>

    <table id="" class="table table-triped" >
        
        
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
                    

                    foreach($cart->contents() as $carrito):?>

                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $carrito['name']; ?> </td>
                        <td> <?php echo number_format($carrito['price'], 2); ?></td>
                        <td> <?php echo $carrito['qty']; ?></td>
                        <?php 
                            $gran_total = $gran_total + $carrito['subtotal']; 
                        ?>
                        <td>
                            <a href="<?=site_url('restarCantidad/'.$carrito['rowid'])?>">
                                <img src="<?=site_url("assets/img/restarCarrito.png")?>" style="width: 25px;"></img>
                            </a>
                            
                            <a href="<?=site_url('sumarCantidad/'.$carrito['rowid'])?>">
                                <img src="<?=site_url("assets/img/agregarCarrito.png")?>" style="width: 25px;"></img>
                            </a>
                        </td>
                        <td>
                            <a href="<?=site_url('eliminaProducto/'.$carrito['rowid'])?>">Eliminar</a>
                        </td>
                        <td>$<?php echo number_format($carrito['subtotal'], 2); ?></td>
                    </tr>
                    
                
                <?php endforeach; ?>
            </tbody>
            <p><h4>Total de la Compra: $<strong><?php echo number_format($gran_total, 2); ?></strong></h4></p>
        
        
    </table>
    
    
    
    <br>
    <a href="catalogoProductos"  class="btn btn-info">Agregar productos</a>
    <?php 
            if($cart->contents()){
                echo ('<a href='.'"borrarCarrito"'. 'class=' . '"btn btn-danger"' .'>Eliminar</a>');
                echo ('<a href='.'"comprar_carrito"' . 'class=' . '"btn btn-success"' .'>Confirmar compra</a>');
            }
        ?>
</div>