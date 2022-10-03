<div class="container form-productos p-3">
    <h4 class="mt-4 text-center text-white" style="background: black; border-radius: 1rem; margin-bottom: 2%;">Detalles de Venta </h4> 
    <div class="table-responsive">
        


        <table class="table " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    
                    <th>IDP</th>
                    <th>NOMBRE PRODUCTO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>TOTAL </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if ($ventas) { ?> 
                    <?php foreach ($ventas as $o) { ?>

                        <tr class="text-center">
                            
                            <td> <?php echo $o['id']; ?></td>
                            <td> <?php echo $o['nombre']; ?></td>
                            <td> <?php echo $o['descripciónGeneral']; ?></td>
                            <td> <?php echo $o['cantidad_ventaDetalle']; ?></td>
                            <td> $<?php echo $o['precioPC']; ?></td>
                            <td> $<?php echo $o['total_venta']; ?></td>
                            
                        </tr>
                    <?php
                    }
                }?>
                
            </tbody>
        </table>
    </div> 
</div>