<?php
// Importar el archivo de conexión y cualquier otra lógica necesaria
require_once 'config/conexion.php';

class consultarIncidenciaModel
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }

    public function obtenerIncidencia($num_incidencia)
    {
        $query = "SELECT INC_codigo, INC_codigoPatrimonial, CAT_nombre, INC_fecha, INC_asunto
        FROM Incidencia
        INNER JOIN Categoria ON Incidencia.CAT_codigo = Categoria.CAT_codigo
        WHERE 1 = 1";
// Preparar la consulta SQL con parámetros
        $stmt = $this->conector->prepare($query);
        $stmt->bindParam("num_incidencia", $num_incidencia);
        $stmt->execute();

// Obtener los resultados de la consulta en un arreglo asociativo
        $incidencias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver el resultado de la consulta
        return $incidencias;
    }
}