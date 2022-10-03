<div class="Container listaProductos">
    <h3 class="card-title" style="padding-top:1%;">Registro de productos <b>GofI Shop</b></h3>

    <ul class="nav">
        <li class="nav-item">
        <a href="<?=site_url('cargarProductos')?>" type="button" class="btn btn-success">Añadir</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=site_url('listaProductosEliminados')?>">Eliminados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=site_url('productosEnOferta')?>">En oferta</a>
        </li>

    </ul>
    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">En oferta</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $compu):?>
            <?php if($compu['eliminado']==0 ):?>
            <tr>
                <td> <?= $compu['id'] ?> </td>
                <td><?= $compu['nombre'] ?></td>
                <td><?= $compu['descripciónGeneral'] ?></td>
                <td><?= $compu['stock'] ?></td>
                <td><?= $compu['precioPC'] ?></td>
                <td>
                    <a href="<?=site_url('enOferta/'.$compu['id'])?>" class="btn btn-success"
                        type="button">+</a>
                    <a href="<?=site_url('quitarOferta/'.$compu['id'])?>" class="btn btn-warning"
                        type="button">-</a></td>    
                </td>
                   
                <td>

                    <a href="<?=site_url('editarProducto/'.$compu['id'])?>" class="btn btn-info"
                        type="button">Editar</a>
                    <a href="<?=site_url('borrarProducto/'.$compu['id'])?>" class="btn btn-danger"
                        type="button">Borrar</a>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>