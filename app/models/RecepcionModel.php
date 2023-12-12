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
                    $INC_codigo
                ]
            );


            if ($success) {
                echo "Error al insertar la recepcion.";
                return $success;
            } else {
                return false;
            }
        } else {
            echo "Error de conexión a la base de datos.";
            return false;
        }
    }

}
?>