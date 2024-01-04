<?php

require_once 'app/models/consultarIncidenciaModel.php';

class consultaIncidenciaController
 private $incidenciasModel;
    public function __construct($incidenciasModel){
    $this->incidenciasModel = $incidenciasModel;
}
    /**
     * Realiza la consulta de paraderos al pulsar el botón Buscar.
     */
    public function consultarIncidencias()
{
    // Verifica si la solicitud es POST (es decir, se envió el formulario)
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obtén los valores de usuario y contraseña del formulario
        $num_incidencia = $_GET['busqueda'];
//            $placa = '8596-1T';
        $incidenciasConsulta = $this->paraderosModel->obtenerIncidencia($num_incidencia);

        return $incidenciasConsulta;
//            include("papeletas.php");
        exit(); // Termina la ejecución después de mostrar los resultados
    }
}
}

