<?php
//$log = \Config\Services::logger();
//$log->log("error", $results);
?>
<table border="1" width="100" class="table table-striped table-sm">
    <thead class="thead-dark">
        <tr>
            <th colspan="7" class="text-center">Actividades</th>
        </tr>
        <tr>
            <th class="text-center">Actividad</th>
            <th class="text-center">Precio</th>
            <th class="text-center w-25">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($results)) { ?>
            <?php
            foreach ($results as $i => $row) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $row->titulo ?></td>
                    <td class="text-right"><?php echo number_format($row->precio, 2) ?></td>
                    <td class="text-center">
                        <span onclick="reservar(<?php echo $row->id ?>,<?php echo $numero_personas ?>)" class="fa-solid fa-calendar-check" title="Reservar actividad"></span>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7" class="text-center text-info"><strong>-- No hay actividades con estos filtros --</strong></td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-center">
                <?php echo isset($links) ? $links : "" ?>
            </td>
        </tr>
    </tfoot>
</table>


