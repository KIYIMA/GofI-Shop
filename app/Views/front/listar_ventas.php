<div class="container form-productos p-3">
    <h4 class="mt-4 text-center text-white" style="background: black; border-radius: 1rem; margin-bottom: 2%;">VENTAS </h4> 
    <div class="table-responsive">
        <table class="table " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
            
                    <th>NOMBRE CLIENTE</th>
                    <th>EMAIL CLIENTE</th>
                    <th>TOTAL PAGADO</th>
                    <th>DETALLES</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($ventas) { ?> 
                    <?php foreach ($ventas as $dato) { ?>

                        <tr class="text-center">
                            <td> <?php echo $dato['nombreUsu']; ?></td>
                            <td> <?php echo $dato['emailUsu']; ?></td>
                            <td> $<?php echo $dato['total_venta']; ?></td>
                            <td> 
                                <a href="<?php echo base_url('ver_detalles/'.$dato['id']); ?>" class="btn btn-default btn-sm">
                                    <h6 class="btn btn-info btn-sm">VER DETALLES</h6>
                                </a>
                            </td>
                        </tr>
                    <?php
    }
}?>
            </tbody>
        </table>
    </div> 
</div>