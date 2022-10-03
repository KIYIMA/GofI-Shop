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
            <?php if($detalles ):?>
            <?php foreach($detalles as $detalle):?>
            <tr>
                <td> <?= $detalle['venta_id'] ?> </td>
                <td><?= $detalle['producto_id'] ?></td>
                
                <td><?= $detalle['cantidad_ventaDetalle'] ?></td>
                <td><?= $detalle['precio_ventaDetalle'] ?></td>
                <td>
                <?php 
                    $costo_total= $costo_total+$detalle['precio_ventaDetalle'] * $detalle['cantidad_ventaDetalle'];
                    echo $detalle['precio_ventaDetalle'] * $detalle['cantidad_ventaDetalle']; 
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            
        </tbody>
    </table>

    <div class="text-center">
        <h3 class="m-2 btn btn-success">TOTAL GASTADO: $ <?php echo $costo_total ?> </h3>
    </div>
</div>