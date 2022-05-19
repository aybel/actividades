<?php
//$log = \Config\Services::logger();
//$log->log("error", $results);
?>
<table border="1" width="100" class="table table-striped table-sm">
    <thead class="thead-dark">
        <tr>
            <th colspan="7" class="text-center">Reservaciones</th>
        </tr>
        <tr>
            <th class="text-center">ID de reservación</th>
            <th class="text-center">Actividad</th>
            <th class="text-center">Horario</th>
            <th class="text-center">Número de personas</th>
            <th class="text-center">Costo</th>
            <th class="text-center w-25">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($results)) { ?>
            <?php
            $total = 0.00;
            foreach ($results as $i => $row) {
                $total += $row->precio;
            ?>
                <tr>
                    <td class="text-center"><?php echo hash("sha256", $row->id) ?></td>
                    <td class="text-center"><?php echo $row->titulo ?></td>
                    <td class="text-center">Inicia el <?php echo date_format(date_create($row->fecha_inicial), 'd-m-Y') ?> al

                        <?php echo date_format(date_create($row->fecha_final), 'd-m-Y') ?>

                    </td>
                    <td class="text-right"><?php echo $row->num_personas ?></td>
                    <td class="text-right"><?php echo number_format($row->precio, 2) ?></td>
                    <td class="text-center">
                        <span onclick="borrar(<?php echo $row->id ?>)" class="fa-solid fa-trash" title="Borrar actividad"></span>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7" class="text-center text-info"><strong>-- No hay reservaciones registradas --</strong></td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-right">Total a pagar: $</td>
            <td class="text-right"><strong><?php echo number_format($total) ?></strong></td>
        </tr>
        <tr>
            <td colspan="6" class="text-center"><button class="btn btn-success">Pagar</button></td>
        </tr>
        <tr>
            <td colspan="7" class="text-center">
                <?php echo isset($links) ? $links : "" ?>
            </td>
        </tr>
    </tfoot>
</table>