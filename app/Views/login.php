<?php $this->extend('default'); ?>
<?php
$this->section('login');

?>

<section>
    <?php if ($estado != 1) { ?>
        <div id="divAlerts" class="">
            <?php if ($estado == 0) { ?>
                <div class="alert alert-warning" role="alert">
                    Sistema no disponible
                </div>
            <?php } ?>
            <?php if ($estado == 101) { ?>

            <?php } ?>
        </div>
    <?php } ?>
    <div class="row align-items-center justify-content-center" style="height: 83vh;">
        <form action="<?php echo base_url('UsuariosController/login') ?>" class="w-50" method="post" id="FormLogin">
            <div class="row w-100 fondo-login">
                <fieldset>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="mt-4">Iniciar sesión</h4>
                        <div class="row">
                            <div class="col-1"></div>

                            <div class="col-10 form-inline  d-flex justify-content-center">
                                <i class="fa-solid fa-user mr-1"></i>
                                <input id="usuario" 
                                       name="usuario" type="text" 
                                       class="form-control form-control-sm w-50"
                                       placeholder="Usuario">
                            </div>
                            <div class="col-1 "></div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-1 "></div>
                            <div class="col-10 form-inline  d-flex justify-content-center">
                                <i class="fa-solid fa-lock mr-1"></i>
                                <input id="password" name="password" type="password" class="form-control form-control-sm w-50" placeholder="Contraseña">
                            </div>
                            <div class="col-1 "></div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-1 "></div>
                            <div class="col-10 form-inline  d-flex justify-content-center">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                <select id="anio" name="anio" class="w-50 form-select form-select-sm">
                                    <option value="">--Seleccionar año de ejercicio--</option>                              
                                </select>
                            </div>
                            <div class="col-1 "></div>
                        </div>
                        <div class="row mb-3 mt-2">
                            <div class="col-1 "></div>
                            <div class="col-10 ">
                                <div class="input-group d-flex justify-content-center">
                                    <button id="btnIngresar" class="btn btn-primary"
                                            style="color: white; font-size: 1vw; transform: translateY(-2px);"
                                            type="submit">INGRESAR</button>
                                </div>
                            </div>
                            <div class="col-1 "></div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
<?php if (isset($estado)) { ?>
    <?php if ($estado == 110) { ?>
            sweetAlert('error', "Error en captura", "Debe escribir el usuario.");
    <?php } else if ($estado == 111) { ?>
            sweetAlert('error', "Error en captura", "Debe escribir password.");
    <?php } else if ($estado == 113) { ?>
            sweetAlert('error', "Error en permisos", "Credenciales incorrectas, verifique por favor.");
    <?php } else if ($estado == 114) { ?>
            sweetAlert('error', "Error en permisos", "Su acceso al sistema se encuentra inactivo, consultar al administrador del sistema.");
    <?php } else if ($estado == 115) { ?>
            sweetAlert('error', "Error en permisos", "El usuario ha sido dado de baja.");
    <?php } else if ($estado == 112) { ?>
            sweetAlert('error', "Error en permisos", "Debe seleccionar el año de ejercicio.");
    <?php } ?>
<?php } ?>
<?php if (isset($comboAnio) && !empty($comboAnio)) { //$log->log("error", $comboAnio);  ?>
        removeChildSelect($("#anio"), '-- Seleccionar año de ejercicio --');
        $.each(<?php echo json_encode($comboAnio); ?>, function (i, item) {
            $('#anio').append('<option value="' + item['anio'] + '">' + item['anio'] + '</option>');
        });
<?php } ?>
</script>

<?php $this->endSection() ?>