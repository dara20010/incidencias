<?php
// Importamos las credenciales y la clase de conexión
require_once 'config/conexion.php';

class RecepcionModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function insertarRecepcion($USU_codigo, $IMP_codigo, $PRI_codigo, $REC_hora, $REC_fecha, $INC_codigo)
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "INSERT INTO Recepcion (USU_codigo, IMP_codigo, PRI_codigo, REC_hora, REC_fecha, INC_codigo)
                VALUES (?, ?, ?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);


            $success = $stmt->execute(
                [
                    $USU_codigo,
                    $IMP_codigo,
                    $PRI_codigo,
                    $REC_hora,
                    $REC_fecha,
                    $INC_codigo,
                ]
            );


            if ($success) {
                echo "Error al insertar la recepcion.";
                return $success;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión cierreController la base de datos.";
            return false;
        }
    }

    public function recepcionarIncidencia($INC_codigo)
    {
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

    public function obtenerRecepcionesRegistradas()
    {
        try {
            $conn = $this->conexion->getConexion();

            if ($conn != null) {
                $sql = "SELECT R.REC_codigo, R.INC_codigo, I.INC_codigoPatrimonial AS codigo_patrimonial, I.INC_estado, 
       P.PRI_nombre AS prioridad, R.REC_fecha, Imp.IMP_nombre AS impacto
                        FROM Recepcion R
                        INNER JOIN Incidencia I ON R.INC_codigo = I.INC_codigo
                        INNER JOIN Prioridad P ON R.PRI_codigo = P.PRI_codigo
                        INNER JOIN Impacto Imp ON R.IMP_codigo = Imp.IMP_codigo  WHERE I.INC_estado != 3";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                throw new Exception("Error de conexión a la base de datos.");
            }
        } catch (PDOException $e) {
            throw new Exception("Error al obtener las recepciones: " . $e->getMessage());
        }
    }
}

?>
