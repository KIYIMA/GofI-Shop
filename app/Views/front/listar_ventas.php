<div class="container form-productos p-3">
    <h4 class="mt-4 mb-4 p-2 text-center titleVentas  text-white bg-black" >VENTAS </h4> 
    <div class="table-responsive mt-3">
        <table id="example" class="display  responsive nowrap" style="width:100%">
            <thead>
                <tr class="text-center">
            
                    <th>CLIENTE</th>
                    <th>EMAIL</th>
                    <th>FECHA</th>
                    <th>TOTAL</th>
                    <th>DETALLES</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($ventas) { ?> 
                    <?php foreach ($ventas as $dato) { ?>

                        <tr class="text-center">
                            <td> <?php echo $dato['nombreUsu']; ?></td>
                            <td> <?php echo $dato['emailUsu']; ?></td>
                            <td> <?php echo $dato['compra_fecha']; ?></td>
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