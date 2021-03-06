<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\Actividades;
use App\Models\Reservaciones;

/**
 * Description of VentasController
 *
 * @author abel4
 */
class ReservaController extends BaseController
{

    public function index()
    {
        return $this->view->render('Reservas/index');
    }

    public function cargar_actividades()
    {
        $uri = service('uri');
        $get = $uri->getSegment(3);
        $params = array();
        $conditions = array();
        $limit_per_page = 20;
        $page = $this->request->getPost('page');
        $actvidades = new Actividades();
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        if ($this->request->getPost("data")) { //ajax
            $data = $this->request->getPost("data");
            //$this->log($data);
            $filters = array();
            $total_records = 0;
            if ($actvidades->getActividades($data)) {
                $total_records = COUNT($actvidades->getActividades($data));
            }
            //log_message("error", $total_records);
            $params['target'] = '#div_table_actividades';
            $params['base_url'] = base_url() . '/ReservaController/cargar_actvidades';
            $params['total_rows'] = $total_records;
            $params['per_page'] = $limit_per_page;
            $params['loading'] = '#div_table_actividades';
            $params["uri_segment"] = 4;
            $this->ajax_pagination->initialize($params);
            $conditions['start'] = $offset;
            $conditions['limit'] = $limit_per_page;
            $params['start'] = $offset;
            $params['numero_personas'] = $data['numero_personas'];
            $params["results"] = $actvidades->getActividades($data);
        }
        echo view('/Elements/Reserva/tabla_actividades', $params);
    }

    public function agregar_actividades()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost('data');

            $Actividades = new Actividades();
            $dataActividad = $Actividades->getActividaPrecio($data['id']);

            if (!isset($data['numero']) || $data['numero'] <= 0) {
                $resp['clase'] = "warning";
                $resp['msj'] = "Para reservar la actividad el n??mero de personas debe ser mayor a cero.";
                echo json_encode($resp);
                return;
            }

            $Reservaciones = new Reservaciones();

            $arrSave["id"] = "";
            $arrSave["id_actividad"] = $data['id'];
            $arrSave["num_personas"] = $data['numero'];
            $arrSave["precio"] = str_replace(array(',', '$'), array(''), $dataActividad['0']->precio) * $data['numero'];
            $arrSave["fecha"] = date("Y-m-d H:i:s");
            $arrSave["fecha_realizacion"] = $dataActividad['0']->fecha_inicial;

            //$this->log($arrSave);
            $Reservaciones->insert($arrSave);

            $resp['clase'] = "success";
            $resp['msj'] = "Actividad reservada";

            echo json_encode($resp);
        }
    }

    public function cargar_reservaciones()
    {
        $uri = service('uri');
        $get = $uri->getSegment(3);
        $params = array();
        $conditions = array();
        $limit_per_page = 20;
        $page = $this->request->getPost('page');
        $Reservaciones = new Reservaciones();
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        if ($this->request->getPost("data")) { //ajax
            $data = $this->request->getPost("data");
            //$this->log($data);
            $filters = array();
            $total_records = 0;
            if ($Reservaciones->getReservas($data)) {
                $total_records = COUNT($Reservaciones->getReservas($data));
            }
            //log_message("error", $total_records);
            $params['target'] = '#div_table_reservaciones';
            $params['base_url'] = base_url() . '/ReservaController/cargar_reservaciones';
            $params['total_rows'] = $total_records;
            $params['per_page'] = $limit_per_page;
            $params['loading'] = '#div_table_reservaciones';
            $params["uri_segment"] = 4;
            $this->ajax_pagination->initialize($params);
            $conditions['start'] = $offset;
            $conditions['limit'] = $limit_per_page;
            $params['start'] = $offset;

            $params["results"] = $Reservaciones->getReservas($data);
        }
        echo view('/Elements/Reserva/ver_reservaciones', $params);
    }


    public function borrar()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('data');
            $Reservaciones = new Reservaciones();
            //$this->log($arrSave);

           
            $dataBorrado['bborrado'] = 1;

            $Reservaciones->where('id', $id);
            $Reservaciones->update($dataBorrado);

            $resp['clase'] = "success";
            $resp['msj'] = "Reservaci??n borrada.";

            echo json_encode($resp);
        }
    }
}
