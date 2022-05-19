<?php $this->extend('inicio'); ?>
<?php $this->section('main'); ?>
<?php
//$log = \Config\Services::logger();
//$log->log("error", $data);
?>
<div>
    <div class="row">
        <div class="col">
            <form class="form">
                <div class="form-group form-inline">
                    <label for="fecha_inicial" class="col-4 d-flex justify-content-end p-2">Fecha inicial:</label>
                    <input type="date" id="fecha_inicial" name="fecha_inicial" value="" class="w-20 form-control col-8 form-control-sm clean" />
                </div>
                <div class="form-group form-inline">
                    <label for="fecha_final" class="col-4 d-flex justify-content-end p-2">Fecha final:</label>
                    <input type="date" id="fecha_final" name="fecha_final" value="" class="w-20 form-control col-8 form-control-sm clean" />
                </div>
                <div class="form-group form-inline">
                    <label for="numero_personas" class="col-4 d-flex justify-content-end p-2">Número de personas:</label>
                    <input type="text" id="numero_personas" name="numero_personas" value="" class="w-20 form-control col-8 form-control-sm clean" />
                </div>
                <div class="form-group col-12 d-flex justify-content-center mt-2">
                    <input id="btn_buscar" type="button" class=" btn btn-success btn_buscar" value="Buscar" />
                </div>
            </form>
        </div>
    </div>
    <div id="div_table_actividades"></div>
    <div id="div_table_reservaciones"></div>
</div>
<script type="text/javascript">
    $(function() {

        $("#btn_buscar").click(function() {
            let params = {
                fecha_inicial: "",
                fecha_final: "",
                numero_personas: ""
            };
            params.fecha_inicial = $("#fecha_inicial").val();
            params.fecha_final = $("#fecha_final").val();
            params.numero_personas = $("#numero_personas").val();
            //console.log(params);
            if (params.fecha_inicial == "") {
                sweetAlert("warning", "Advertencia", "Debe elegir una fecha inicial.");
                return;
            }
            cargar_actividades(params);
        });
        //cargar_reservaciones();

    });

    const cargar_actividades = (params) => {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'POST',
                url: PRY_FULL_URL + '/ReservaController/cargar_actividades',
                datatype: 'html',
                data: {
                    data: params
                },
                beforeSend: function(XMLHttpRequest) {
                    $('#ContenedorLoading').ajaxloader();
                },
                success: function(data) {
                    resolve(data);
                    $("#div_table_actividades").empty();
                    $("#div_table_actividades").html(data);
                    //console.log(data);
                },
                complete: function() {
                    $('#ContenedorLoading').ajaxloader('hide');
                },
                error: function() {
                    reject("error");
                    sweetAlert('error', 'Ocurrió un error, consultar con el administrador del sistema.');
                }
            });
        });
    };

    const reservar = (id, numero) => {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'POST',
                url: PRY_FULL_URL + '/ReservaController/agregar_actividades',
                datatype: 'json',
                data: {
                    data: {
                        id: id,
                        numero: numero
                    }
                },
                beforeSend: function(XMLHttpRequest) {
                    $('#ContenedorLoading').ajaxloader();
                },
                success: function(data) {
                    resolve(data);
                    console.log(data);
                    const result = JSON.parse(data);
                    sweetAlert(result.clase, "Mensaje", result.msj);
                    cargar_reservaciones();
                },
                complete: function() {
                    $('#ContenedorLoading').ajaxloader('hide');
                },
                error: function() {
                    reject("error");
                    sweetAlert('error', "Mensaje", 'Ocurrió un error, consultar con el administrador del sistema.');
                }
            });
        });
    };
    const cargar_reservaciones = () => {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: 'POST',
                url: PRY_FULL_URL + '/ReservaController/cargar_reservaciones',
                datatype: 'html',
                data: {
                    data: 1
                },
                beforeSend: function(XMLHttpRequest) {
                    $('#ContenedorLoading').ajaxloader();
                },
                success: function(data) {
                    resolve(data);
                    $("#div_table_reservaciones").empty();
                    $("#div_table_reservaciones").html(data);
                    console.log(data);
                },
                complete: function() {
                    $('#ContenedorLoading').ajaxloader('hide');
                },
                error: function() {
                    reject("error");
                    sweetAlert('error', 'Ocurrió un error, consultar con el administrador del sistema.');
                }
            });
        });
    };
</script>
<?php $this->endSection() ?>