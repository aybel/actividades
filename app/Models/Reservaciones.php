<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of Actividades
 *
 * @author abel4
 */
class Reservaciones extends Model {

    protected $table = 'reservaciones';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', 'id_actividad', 'num_personas', 'precio', 'created_at','fecha_realizacion'
    ];
    protected $useTimestamps = true;
    protected $validationMessages = [];
    protected $skipValidation = false; //Escapar validaciones

    protected function initialize() {
        $this->Logs = \Config\Services::logger();
    }

    
}
