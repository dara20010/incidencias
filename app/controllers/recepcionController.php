<?php
require 'app/models/RecepcionModel.php';
require 'app/models/IncidenciaModel.php';

class RecepcionController
{
    private $recepcionModel;
    private $incidenciaModel;

    public function __construct()
    {
        $this->recepcionModel = new RecepcionModel();
        $this->incidenciaModel = new IncidenciaModel();
    }

    public function registrarRecepcion()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $USU_codigo = $_POST['usuario'];
            $IMP_codigo = $_POST['impacto'];
            $PRI_codigo = $_POST['prioridad'];
            $REC_hora = $_POST['hora'];
            $REC_fecha = $_POST['fecha_recepcion'];
            $INC_codigo = $_POST['INC_codigo'];


            // Llamar al método del modelo para insertar la recepcion en la base de datos
            $insertSuccess = $this->recepcionModel->insertarRecepcion($USU_codigo, $IMP_codigo, $PRI_codigo, $REC_hora, $REC_fecha, $INC_codigo);

            if ($insertSuccess) {

                $recepcionarSuccess = $this->incidenciaModel->recepcionarIncidencia($INC_codigo);
                header('Location: registro-recepcion.php');
            } else {
                // Mostrar un mensaje de error
                echo "Error al registrar la recepcion.";
            }
        } else {
            // Manejar el caso en el que no se recibe un POST (puede ser una redirección o una respuesta de error)
            echo "Error: Método no permitido.";
        }
    }

}

?>