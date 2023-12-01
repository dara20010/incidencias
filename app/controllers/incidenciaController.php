<?php
// Importar el modelo IncidenciaModel.php
require 'app/models/IncidenciaModel.php';

class IncidenciaController {
    private $incidenciaModel;

    public function __construct() {
        // Crear una instancia del modelo IncidenciaModel
        $this->incidenciaModel = new IncidenciaModel();
    }

    public function registrarIncidencia() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $categoria = $_POST['categoria'];
            $prioridad = $_POST['prioridad'];
            $area = $_POST['area'];
            $fecha = $_POST['fecha'];
            $codigo_patrimonial = $_POST['codigo_patrimonial'];
            $asunto = $_POST['asunto'];
            $numero_documento = $_POST['numero_documento'];
            $documento = $_POST['documento'];
            $descripcion = $_POST['descripcion'];

            // Llamar al método del modelo para insertar la incidencia en la base de datos
            $this->incidenciaModel->insertarIncidencia($categoria, $prioridad, $area, $fecha, $codigo_patrimonial, $asunto, $numero_documento, $documento, $descripcion);
        } else {
            // Manejar el caso en el que no se recibe un POST (puede ser una redirección o una respuesta de error)
            echo "Error: Método no permitido.";
        }
    }
}

// Crear una instancia del controlador y ejecutar el registro de la incidencia
$incidenciaController = new IncidenciaController();
$incidenciaController->registrarIncidencia();
?>
