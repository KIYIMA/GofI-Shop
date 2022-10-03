<div class="Container listaUsuarios">

    <h3 class="card-title">Usuarios - <b>GofI Shop</b></h3>

    <ul class="nav">
        <li class="nav-item">
            <a href="<?=site_url('/registro')?>" class="btn btn-primary ml-auto"
                style="margin-bottom: 1%; ">Registrar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=site_url('deletedUsers')?>">Eliminados</a>
        </li>

    </ul>


    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarioss as $usuario):?>
            <?php if($usuario['eliminado'] == 0):?>
            <tr>
                <td> <?= $usuario['id'] ?> </td>
                <td><?= $usuario['nombreUsu'] ?></td>
                <td><?= $usuario['apellidoUsu'] ?></td>
                <td><?= $usuario['emailUsu'] ?></td>
                <td><?= $usuario['perfilUsu'] ?></td>
                <td>
                    <a href="<?=site_url('editarUsuario/'.$usuario['id'])?>" class="btn btn-warning"
                        type="button">Editar</a>
                    <a href="<?=site_url('borrarUsuario/'.$usuario['id'])?>" class="btn btn-danger"
                        type="button">Borrar</a>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>



</div>