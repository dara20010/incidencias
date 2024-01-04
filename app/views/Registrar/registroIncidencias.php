<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/assets/logo.ico">

    <!-- Importación de librería jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Agrega las hojas de estilo de Tailwind CSS -->
    <link href="http//cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Agrega la fuente Poppins desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
    <!-- Implementación de funcionalidades para la vista cliente -->
    <script src="/app/Views/Func/password-toggle.js"></script>
    <!-- Implementación de iconos-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Incluye Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <title class="text-center text-3xl font-poppins">Sistema de Incidencias</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<!-- Contenido principal -->
<main class="bg-[#eeeff1] flex-1 p-4 overflow-y-auto">
    <!-- Header -->
    <h1 class="text-xl font-bold mb-4"">Registro de Incidencia</h1>
    <!-- Formulario -->
    <form id="formIncidencia" action="registro-incidencia.php?action=registrar" method="POST" class="border bg-white shadow-md p-6 w-full text-sm rounded-md">
        <!-- PRIMERA FILA Campo para mostrar el número de incidencia -->
        <div class="flex items-center mb-4">
            <label for="numero_incidencia" class="block font-bold mb-1 mr-1 text-lime-500">Nro Incidencia:</label>
            <input type="text" id="numero_incidencia" name="numero_incidencia"
                   class="w-20 border border-gray-200 bg-gray-100 rounded-md p-2 text-sm" readonly disabled>
            <!-- El atributo 'readonly' evita que el usuario edite este campo -->
        </div>
        <!-- SEGUNDA fila: Categoria, Prioridad, Fecha -->
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                <label for="categoria" class="block mb-1 font-bold text-sm">Categoría:</label>
                <select id="categoria" name="categoria"
                        class="border p-2 w-full text-sm">
                </select>
            </div>
            <div class="w-full md:w-1/3 px-2 mb-2">
                <label for="hora" class="block font-bold mb-1">Hora:</label>
                <input type="time" id="hora" name="hora" class="border border-gray-200 bg-gray-100 p-2 w-full text-sm" readonly>

            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                <label for="fecha" class="block mb-1 font-bold text-sm">Fecha:</label>
                <input type="date" id="fecha" name="fecha" class="border border-gray-200 bg-gray-100 p-2 w-full text-sm" readonly>
            </div>
        </div>
        <?php
        // Obtener la fecha actual
        date_default_timezone_set('America/Lima');
        $fecha_actual = date('Y-m-d');

        // Obtener la hora actual
        $hora_actual = date('H:i');
        ?>
        <script>
            document.getElementById('fecha').value = '<?php echo $fecha_actual; ?>';
            document.getElementById('hora').value = '<?php echo $hora_actual; ?>';
        </script>

        <!-- TERCERA fila: Área, Código Patrimonial -->
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="area" class="block mb-1 font-bold text-sm">Área:</label>
                <select id="area" name="area"
                        class="border p-2 w-full text-sm">
                </select>
            </div>
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="codigo_patrimonial" class="block mb-1 font-bold text-sm">Código Patrimonial:</label>
                <input type="text" id="codigo_patrimonial" name="codigo_patrimonial"
                       class="border p-2 w-full text-sm">
            </div>
        </div>

        <!-- CUARTA fila: Asunto -->
        <div class="w-full mb-2">
            <label for="asunto" class="block mb-1 font-bold text-sm">Asunto:</label>
            <input type="text" id="asunto" name="asunto"
                   class="border p-2 w-full text-sm">
        </div>
        <!-- QUINTA FILA: Número de Documento Y ARCHIVO DE DOCUMENTO -->
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="numero_documento" class="block mb-1 font-bold text-sm">Número de Documento:</label>
                <input type="text" id="numero_documento" name="numero_documento"
                       class="border p-2 w-full text-sm">
            </div>
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="documento" class="block mb-1 font-bold text-sm">Documento:</label>
                <input type="file" id="documento" name="documento"
                       class="w-full border-gray-300 rounded-md p-2 text-sm">
            </div>
        </div>

        <!-- SEXTA fila: Descripción -->
        <div class="w-full mb-2">
            <label for="descripcion" class="block mb-1 font-bold text-sm">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="border p-2 w-full text-sm max-h-40 resize-none overflow-y-auto"></textarea>
        </div>

        <!-- Botónes -->
        <div class="flex justify-center space-x-4">
            <button type="submit" id="guardar-incidencia" class="bg-[#87cd51] text-white font-bold hover:bg-[#8ce83c] py-2 px-4 rounded">
                Guardar
            </button>
            <button type="button" class="bg-blue-500 text-white font-bold hover:bg-blue-600 py-2 px-4 rounded">
                Editar
            </button>
            <button type="button" id="imprimirDatos" class="bg-yellow-500 text-white font-bold hover:bg-yellow-600 py-2 px-4 rounded w-full md:w-auto mt-2 md:mt-0">
                Imprimir
            </button>
            <button type="button" id="limpiarCampos" class="bg-red-500 text-white font-bold hover:bg-red-600 py-2 px-4 rounded w-full md:w-auto mt-2 md:mt-0">
                Limpiar
            </button>
            <button type="button" id="nuevoRegistro" class="bg-gray-500 text-white font-bold hover:bg-gray-600 py-2 px-4 rounded w-full md:w-auto mt-2 md:mt-0">
                Nuevo
            </button>
        </div>


    </form>
    <!-- Fin del formulario -->
</main>
</body>
<script>
    $(document).ready(function () {
        console.log("FETCHING")
        $.ajax({
            url: '../../../ajax/getCategoryData.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var select = $('#categoria');
                select.empty();
                $.each(data, function (index, value) {
                    select.append('<option value="' + value.CAT_codigo + '">' + value.CAT_nombre + '</option>');
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $(document).ready(function () {
        console.log("FETCHING")
        $.ajax({
            url: '../../../ajax/getAreaData.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var select = $('#area');
                select.empty();
                $.each(data, function (index, value) {
                    select.append('<option value="' + value.ARE_codigo + '">' + value.ARE_nombre + '</option>');
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    $(document).ready(function () {
        console.log("FETCHING")
        $.ajax({
            url: '../../../ajax/getLastIncidencia.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var select = $('#numero_incidencia');
                select.empty();
                select.val(data.INC_codigo);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    function limpiarCampos() {
        // Obtener el formulario por su ID
        const form = document.getElementById('formIncidencia');
        // Limpiar los campos del formulario
        form.reset();
    }
   const btnLimpiar = document.getElementById('limpiarCampos');
    btnLimpiar.addEventListener('click', limpiarCampos);

    function nuevoRegistro() {
        const form = document.getElementById('formIncidencia');

        // Restablecer el formulario
        form.reset();
    }
    // Asignar el evento 'click' al botón 'Nuevo Registro'
    const btnNuevo = document.getElementById('nuevoRegistro');
    btnNuevo.addEventListener('click', nuevoRegistro);

    //GUARDAR DATOS
    $(document).ready(function() {
        $("#guardar-incidencia").on("click", function() {
            // Obtener los datos del formulario
            var formData = $("form").serialize(); // Obtener los datos del formulario

            $.ajax({
                url: "registro-incidencia.php", // Reemplaza "tu_archivo_de_backend.php" con tu ruta de backend
                type: "POST",
                data: formData,
                success: function(response) {
                    // Manejar la respuesta del servidor si es necesario
                    alert("Datos guardados exitosamente");
                    // Puedes limpiar el formulario si lo deseas
                    $("form")[0].reset();
                },
                error: function(xhr, status, error) {
                    // Manejar los errores si la solicitud falla
                    console.error(error);
                    alert("Error al guardar los datos. Por favor, inténtalo de nuevo.");
                }
            });
        });
    });

</script>
</html>
