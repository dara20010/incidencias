<?php
// Importar el modelo IncidenciaModel.php
require 'app/models/IncidenciaModel.php';

class IncidenciaController
{
    private $incidenciaModel;

    public function __construct()
    {
        // Crear una instancia del modelo IncidenciaModel
        $this->incidenciaModel = new IncidenciaModel();
    }

    public function registrarIncidencia()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $categoria = $_POST['categoria'];
            $area = $_POST['area'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $codigo_patrimonial = $_POST['codigo_patrimonial'];
            $asunto = $_POST['asunto'];
            $numero_documento = $_POST['numero_documento'];
            $documento = $_POST['documento'];
            $descripcion = $_POST['descripcion'];

            // Llamar al método del modelo para insertar la incidencia en la base de datos
            $insertSuccess = $this->incidenciaModel->insertarIncidencia($fecha, $asunto, $codigo_patrimonial, $documento, 1, $numero_documento, $descripcion, $categoria, 2, $area, 1,$hora);

            if ($insertSuccess) {
                // Redirigir cierreController la página de consulta de incidencias.bak
                $incidencias = $this->incidenciaModel->obtenerTodasLasIncidencias();
                // Mostrar los datos de las incidencias
                foreach ($incidencias as $incidencia) {
                    echo "CATEGORIA: " . $incidencia['categoria'] . "<br>";
                    echo "AREA: " . $incidencia['area'] . "<br>";
                    echo "FECHA: " . $incidencia['fecha'] . "<br>";
                    echo "HORA: " . $incidencia['hora'] . "<br>";
                    echo "CODIGO PATRIMONIAL: " . $incidencia['codigo_patrimonial'] . "<br>";
                    echo "ASUNTO: " . $incidencia['asunto'] . "<br>";
                    echo "NUMERO DE DOCUMENTO: " . $incidencia['numero_documento'] . "<br>";
                    echo "DOCUMENTO: " . $incidencia['documento'] . "<br>";
                    echo "DESCRIPCION: " . $incidencia['descripcion'] . "<br>";
                    echo "<hr>";
                }
            }else {
                    // Mostrar un mensaje de error
                    echo "Error al registrar la incidencia.";
                }
            }else {
            // Manejar el caso en el que no se recibe un POST (puede ser una redirección o una respuesta de error)
            echo "Error: Método no permitido.";
        }
    }

}

?>