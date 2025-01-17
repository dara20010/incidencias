<?php
// Importamos las credenciales y la clase de conexión
require_once 'config/conexion.php';

class IncidenciaModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function obtenerIncidenciaPorId($INC_codigo) {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            try {
                // Preparar la consulta SQL para obtener los registros de incidencias
                $sql = "SELECT * FROM Incidencia i INNER JOIN Categoria c ON i.CAT_codigo = c.CAT_codigo WHERE INC_codigo = ?";

                // Preparar la sentencia
                $stmt = $conn->prepare($sql);

                // Ejecutar la consulta
                $stmt->execute([$INC_codigo]);

                // Obtener los resultados como un array asociativo
                $registros = $stmt->fetch(PDO::FETCH_ASSOC);

                // Devolver los registros obtenidos
                return $registros;
            } catch (PDOException $e) {
                // Manejar cualquier excepción o error que pueda surgir al ejecutar la consulta
                echo "Error al obtener los registros de incidencias: " . $e->getMessage();
                return null;
            }
        } else {
            echo "Error de conexión cierre Controller la base de datos.";
            return null;
        }
    }

    public function insertarIncidencia($INC_fecha, $INC_asunto, $INC_codigoPatrimonial, $INC_documento, $INC_estado, $INC_numDocumento, $INC_observacion, $CAT_codigo, $PRI_codigo, $ARE_codigo, $USU_codigo,$INC_hora)
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "INSERT INTO Incidencia (INC_fecha, INC_asunto, INC_codigoPatrimonial, INC_documento, INC_estado, INC_numDocumento, INC_observacion, CAT_codigo, PRI_codigo, ARE_codigo, USU_codigo,INC_hora)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Ejecutar la inserción sin proporcionar el valor para el campo id
            $success = $stmt->execute(
                [
                    $INC_fecha,
                    $INC_asunto,
                    $INC_codigoPatrimonial,
                    $INC_documento,
                    1,
                    $INC_numDocumento,
                    $INC_observacion,
                    $CAT_codigo,
                    2,
                    $ARE_codigo,
                    1,$INC_hora]
            );

            if ($success) {
                echo "Error al insertar la incidencia.";
                $lastId = $conn->lastInsertId();

                return $lastId;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión cierreController la base de datos.";
            return false;
        }
    }

    //write cierreController function that gets an incidencia with his id and updates his INC_estado to 4
    public function recepcionarIncidencia($INC_codigo) {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "UPDATE Incidencia SET INC_estado = 4 WHERE INC_codigo = ?";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Ejecutar la inserción sin proporcionar el valor para el campo id
            $success = $stmt->execute(
                [
                    $INC_codigo
                ]
            );

            if ($success) {
                echo "Error al actualizar la incidencia.";
                return $success;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión cierreController la base de datos.";
            return false;
        }
    }

    public function cerrarIncidencia($INC_codigo) {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "UPDATE Incidencia SET INC_estado = 3 WHERE INC_codigo = ?";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            // Ejecutar la inserción sin proporcionar el valor para el campo id
            $success = $stmt->execute(
                [
                    $INC_codigo
                ]
            );

            if ($success) {
                echo "Error al actualizar la incidencia.";
                return $success;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión cierreController la base de datos.";
            return false;
        }
    }

    public function obtenerIncidenciasSinRecepcionar() {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            try {
                // Preparar la consulta SQL para obtener los registros de incidencias
                $sql = "SELECT * FROM Incidencia i INNER JOIN Categoria c ON i.CAT_codigo = c.CAT_codigo WHERE INC_estado != 4";

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
            echo "Error de conexión cierre Controller la base de datos.";
            return null;
        }
    }

    public function obtenerTodasLasIncidencias()
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            try {
                // Preparar la consulta SQL para obtener todos los registros de incidencias
                $sql = "SELECT * FROM Incidencia i INNER JOIN Categoria c ON i.CAT_codigo = c.CAT_codigo";

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