<div class="Container listaUsuarios">

    <h3 class="card-title">Consultas - <b>GofI Shop</b></h3>

    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Consulta</th>
                <th scope="col">Fecha</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($consultas as $consulta):?>
            
            <tr>
                <td> <?= $consulta['id_consulta'] ?> </td>
                <td><?= $consulta['email_consulta'] ?></td>
                <td><?= $consulta['consulta'] ?></td>
                <td><?= $consulta['fecha_consulta'] ?></td>

            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>



</div>