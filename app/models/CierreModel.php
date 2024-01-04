<?php
// Importamos las credenciales y la clase de conexión
require_once 'config/conexion.php';

class CierreModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function insertarCierre(
        $CIE_FECHA,
        $USU_codigo,
        $INC_codigo,
        $CIE_ASUNTO,
        $CIE_HORA,
        $CIE_DOCUMENTO,
        $CIE_DIAGNOSTICO,
        $CIE_SOLUCION,
        $CIE_RECOMENDACIONES)
    {
        $conn = $this->conexion->getConexion();

        if ($conn != null) {
            // Preparar la consulta SQL para la inserción sin incluir el campo id
            $sql = "INSERT INTO cierre (
                    CIE_FECHA, 
                    USU_codigo,
                    INC_codigo,
                    CIE_ASUNTO,
                    CIE_HORA, 
                    CIE_DOCUMENTO, 
                    CIE_DIAGNOSTICO, 
                    CIE_SOLUCION, 
                    CIE_RECOMENDACIONES) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la sentencia
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $success = $stmt->execute(
                    [
                        $CIE_FECHA,
                        $USU_codigo,
                        $INC_codigo,
                        $CIE_ASUNTO,
                        $CIE_HORA,
                        $CIE_DOCUMENTO,
                        $CIE_DIAGNOSTICO,
                        $CIE_SOLUCION,
                        $CIE_RECOMENDACIONES,
                    ]
                );

                if ($success) {
                    return true; // Éxito en la inserción
                } else {
                    // Ocurrió un error al ejecutar la consulta
                    $errorInfo = $stmt->errorInfo();
                    echo "Error al insertar el cierre: " . $errorInfo[2]; // Mensaje de error específico de la base de datos
                    return false;
                }
            } else {
                // Error en la preparación de la consulta
                $errorInfo = $conn->errorInfo();
                echo "Error de preparación de la consulta: " . $errorInfo[2];
                return false;
            }
        } else {
            echo "Error de conexión a la base de datos.";
            return false;
        }
    }

}
?>