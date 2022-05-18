<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of Actividades
 *
 * @author abel4
 */
class Actividades extends Model {

    protected $table = 'actividades';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', 'titulo', 'descripcion', 'fecha_inicial', 'fecha_final','precio',"popularidad"
    ];
    protected $useTimestamps = true;
    protected $validationMessages = [];
    protected $skipValidation = false; //Escapar validaciones

    protected function initialize() {
        $this->Logs = \Config\Services::logger();
    }

    public function getActividades($data) {
        $Actividades = new Actividades();
        $Actividades->select(
                [
                    "actividades.id",
                    "actividades.titulo",
                    "actividades.precio"
                    
                ]
        );
        
        $Actividades->where(['actividades.fecha_inicial>='=>$data["fecha_inicial"],'actividades.fecha_final<='=>$data["fecha_final"]]);
    
        $Actividades->orderBy('actividades.popularidad DESC');
        $data = $Actividades->get()->getResultObject();
        return $data;
    }
    
    public function getActividaPrecio($idActividad) {
          $Actividades = new Actividades();
        $Actividades->select(
                [
                    "actividades.id",
                    "actividades.titulo",
                    "actividades.precio",
                    "actividades.fecha_inicial"
                    
                ]
        );
        
        $Actividades->where(['actividades.id>='=>$idActividad]);
    
        $data = $Actividades->get()->getResultObject();
        return $data;
    }


}
