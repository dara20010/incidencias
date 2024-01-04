<?php
session_start();
// Verificar si no hay una sesión iniciada
if (!isset($_SESSION['username'])) {
    //header("Location: index.php"); // Redirigir a la página de inicio de sesión si no hay sesión iniciada
    exit();
}

$busqueda = $_GET['busqueda'] ?? '';

// Importar el controlador necesario
require_once 'app/controllers/consultaIncidenciaController.php';

// Crear una instancia de la conexión a la base de datos
$conexion = new Conexion();
$conector = $conexion->getConexion();

// Crear instancias de los modelos
$modelIncidencias = new Incidencia($conector);

$controller = new IncidenciasController($modelIncidencias);

$resultadoBusqueda = NULL;

if (!empty($busqueda)) {
    $resultadoBusqueda = $controller->consultarIncidencias();
} else {

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="public/assets/logo.ico" />
    <script src="https://cdn.tailwindcss.com"></script>

  <title>Sistema de Incidencias - Consultar Incidencias</title>
</head>


<body class="bg-gray-100 flex items-center justify-center min-h-screen">


<div class="flex shadow-lg p-8 rounded-lg w-full sm:h-screen">
    <?php
    // Incluir la barra lateral desde un archivo externo
    include("app/Views/partials/siderBar.php");
    ?>
    <?php
    // Incluir la barra lateral desde un archivo externo
    include("app/views/Consultar/consultarIncidencia.php");
    ?>
</div>
</body>

</html>