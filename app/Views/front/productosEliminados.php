<div class="Container listaProductos">
    <h3 class="card-title" style="padding-top:1%;">Registro de productos eliminadas - <b>GofI Shop</b></h3>
    <a href="<?=site_url('listaProductos')?>" class="btn btn-info ml-auto"
        style="margin-bottom: 1%; float: right;">Volver</a>
    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Modelo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $compu):?>
            <?php if($compu['eliminado']==1):?>
            <tr>
                <td> <?= $compu['id'] ?> </td>
                <td><?= $compu['nombre'] ?></td>
                <td><?= $compu['descripciónGeneral'] ?></td>
                <td><?= $compu['stock'] ?></td>
                <td><?= $compu['precioPC'] ?></td>
                <td>
                    <a href="<?=site_url('altaProducto/'.$compu['id'])?>" class="btn btn-success" type="button">Alta</a>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>