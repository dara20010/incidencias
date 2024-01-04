<?php
require 'app/models/CierreModel.php'; // Asegúrate de importar el modelo de Cierre
require 'app/models/IncidenciaModel.php'; // Asegúrate de importar el modelo de Incidencia

class cierreController
{
    private $cierreModel; // Instancia del modelo de Cierre
    private $incidenciaModel; // Instancia del modelo de Incidencia

    public function __construct()
    {
        $this->incidenciaModel = new IncidenciaModel(); // Inicializa el modelo de Incidencia
        $this->cierreModel = new CierreModel(); // Inicializa el modelo de Cierre
    }

    public function registrarCierre()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $CIE_CODIGO = $_POST['REC_codigo'];
            $CIE_FECHA = $_POST['fecha_cierre'];
            $USU_codigo = $_POST['usuario'];
            $INC_codigo = $_POST['incidencia'];
            $CIE_ASUNTO = $_POST['asunto'];
            $CIE_HORA = $_POST['hora'];
            $CIE_DOCUMENTO = $_POST['documento'];
            $CIE_DIAGNOSTICO = $_POST['diagnostico'];
            $CIE_SOLUCION = $_POST['solucion'];
            $CIE_RECOMENDACIONES= $_POST['recomendaciones'];

            // Llamar al método del modelo para insertar el cierre en la base de datos
            $insertSuccess = $this->cierreModel->insertarCierre($CIE_FECHA, $USU_codigo, $INC_codigo, $CIE_ASUNTO, $CIE_HORA, $CIE_DOCUMENTO, $CIE_DIAGNOSTICO, $CIE_SOLUCION, $CIE_RECOMENDACIONES);

            if ($insertSuccess) {

                $cierreSuccess = $this->incidenciaModel->cerrarIncidencia($INC_codigo);
                header('Location: registro-cierre.php');
            } else {
                // Mostrar un mensaje de error
                echo "Error al registrar el cierre.";
            }
        } else {
            // Manejar el caso en el que no se recibe un POST (puede ser una redirección o una respuesta de error)
            echo "Error: Método no permitido.";
        }
    }
}


?>