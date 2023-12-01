<?php
// Importamos las credenciales y la clase de conexión
require 'config/conexion.php';

class IncidenciaModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function insertarIncidencia($categoria, $prioridad, $area, $fecha, $codigo_patrimonial, $asunto, $numero_documento, $documento, $descripcion)
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "INSERT INTO Incidencias (categoria, prioridad, area, fecha, codigo_patrimonial, asunto, numero_documento, documento, descripcion) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Ejecutar la inserción sin proporcionar el valor para el campo id
            $success = $stmt->execute([$categoria, $prioridad, $area, $fecha, $codigo_patrimonial, $asunto, $numero_documento, $documento, $descripcion]);

            if ($success) {
                echo "Incidencia insertada correctamente.";
            } else {
                echo "Error al insertar la incidencia.";
            }
        } else {
            echo "Error de conexión a la base de datos.";
        }
    }
}
?>