<div class="Container listaProductos">
    <h3 class="card-title" style="padding-top:1%;">Compras - <b>GofI Shop</b></h3>

    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">N° PEDIDO</th>
                <th scope="col">Nombre producto</th>
                
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Costo Sub-Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $costo_total=0;?>
            
            <?php foreach($compra as $detalle):?>
            <tr>
                <td> <?= $detalle['compras_id'] ?> </td>
                <td><?= $detalle['nombre'] ?></td>
                
                <td><?= $detalle['compra_cantidad'] ?></td>
                <td><?= $detalle['precioPC'] ?></td>
                <td>
                <?php 
                $subTotal= $detalle['compra_subtotal'] * $detalle['compra_cantidad'];
                $costo_total +=  $detalle['compra_subtotal'];
                echo($subTotal);
                    //$costo_total= $costo_total+$detalle['precioTotal'] * $detalle['cantidad_ventaDetalle'];
                    //echo $detalle['precio_ventaDetalle'] * $detalle['cantidad_ventaDetalle']; 
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
            
        </tbody>
    </table>

    <div class="text-center">
        <h3 class="m-2 btn btn-success">TOTAL GASTADO: $ <?php echo $costo_total ?> </h3>
    </div>
</div>