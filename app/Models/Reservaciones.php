<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of Actividades
 *
 * @author abel4
 */
class Reservaciones extends Model
{

    protected $table = 'reservaciones';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', 'id_actividad', 'num_personas', 'precio', 'created_at', 'fecha_realizacion', 'bborrado'
    ];
    protected $useTimestamps = true;
    protected $validationMessages = [];
    protected $skipValidation = false; //Escapar validaciones

    protected function initialize()
    {
        $this->Logs = \Config\Services::logger();
    }

    public function getReservas($data)
    {
        $Reservaciones = new Reservaciones();
        $Reservaciones->select(
            [
                "reservaciones.id",
                "actividades.titulo",
                "actividades.descripcion",
                "reservaciones.num_personas",
                "reservaciones.precio",
                "actividades.fecha_inicial",
                "actividades.fecha_final"

            ]
        );
        $Reservaciones->join('actividades', 'actividades.id=reservaciones.id_actividad', 'INNER');
        $Reservaciones->where(['bborrado' => 0]);
        $Reservaciones->orderBy('reservaciones.id DESC');
        $data = $Reservaciones->get()->getResultObject();
        return $data;
    }

    public function getActividaPrecio($idActividad)
    {
        $Actividades = new Actividades();
        $Actividades->select(
            [
                "actividades.id",
                "actividades.titulo",
                "actividades.precio",
                "actividades.fecha_inicial"

            ]
        );

        $Actividades->where(['actividades.id>=' => $idActividad]);

        $data = $Actividades->get()->getResultObject();
        return $data;
    }
}
