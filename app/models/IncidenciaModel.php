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

    public function insertarIncidencia($INC_fechaHora, $INC_asunto, $INC_codigoPatrimonial, $INC_documento, $INC_estado, $INC_numDocumento, $INC_observacion, $CAT_codigo, $PRI_codigo, $ARE_codigo, $USU_codigo)
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "INSERT INTO Incidencia (INC_fecha, INC_asunto, INC_codigoPatrimonial, INC_documento, INC_estado, INC_numDocumento, INC_observacion, CAT_codigo, PRI_codigo, ARE_codigo, USU_codigo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Ejecutar la inserción sin proporcionar el valor para el campo id
            $success = $stmt->execute(
                [
                    $INC_fechaHora,
                    $INC_asunto,
                    $INC_codigoPatrimonial,
                    $INC_documento,
                    1,
                    $INC_numDocumento,
                    $INC_observacion,
                    $CAT_codigo,
                    2,
                    $ARE_codigo,
                    1]
            );

            if ($success) {
                echo "Error al insertar la incidencia.";
                return $success;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión a la base de datos.";
            return false;
        }
    }
    public function generarReporteIncidencias(){
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            try {
                // Preparar la consulta SQL para obtener los registros de incidencias
                $sql = "SELECT * FROM Incidencia";

                // Preparar la sentencia
                $stmt = $conn->prepare($sql);

                // Ejecutar la consulta
                $stmt->execute();

                // Obtener los resultados como un array asociativo
                $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Devolver los registros obtenidos
                return $registros;
            } catch (PDOException $e) {
                // Manejar cualquier excepción o error que pueda surgir al ejecutar la consulta
                echo "Error al obtener los registros de incidencias: " . $e->getMessage();
                return null;
            }
        } else {
            echo "Error de conexión a la base de datos.";
            return null;
        }
    }

}

?>