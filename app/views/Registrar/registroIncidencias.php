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
    <h1 class="text-2xl font-bold mb-4 ">Registro de Incidencia</h1>
    <!-- Formulario -->
    <form action="registro-incidencia.php?action=registrar" method="POST" class="space-y-2 text-gray-80">
        <!-- Campo para mostrar el número de incidencia -->
        <div class="flex items-center mb-4">
            <label for="numero_incidencia" class="w-28 font-bold text-sm">Nro Incidencia:</label>
            <input type="text" id="numero_incidencia" name="numero_incidencia"
                   class="w-20 border border-gray-200 bg-gray-100 rounded-md p-2 text-sm" readonly disabled>
            <!-- El atributo 'readonly' evita que el usuario edite este campo -->
        </div>
        <!-- Primera fila: Categoria, Prioridad, Fecha -->
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                <label for="categoria" class="block mb-1 font-bold text-sm">Categoría:</label>
                <select id="categoria" name="categoria"
                        class="w-full border-gray-300 rounded-md p-2 text-sm">
                </select>
            </div>
            <div class="w-full md:w-1/3 px-2 mb-2">
                <label for="hora" class="block font-bold mb-1">Hora:</label>
                <input type="time" id="hora" name="hora" class="border p-2 w-full text-sm" readonly disabled>

            </div>
            <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                <label for="fecha" class="block mb-1 font-bold text-sm">Fecha:</label>
                <input type="date" id="fecha" name="fecha"
                       class="w-full border-gray-300 rounded-md p-2 text-sm" readonly disabled >
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

        <!-- Segunda fila: Área, Código Patrimonial -->
        <div class="flex flex-wrap -mx-2">
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="area" class="block mb-1 font-bold text-sm">Área:</label>
                <select id="area" name="area"
                        class="w-full border-gray-300 rounded-md p-2 text-sm">
                </select>
            </div>
            <div class="w-full sm:w-1/2 px-2 mb-2">
                <label for="codigo_patrimonial" class="block mb-1 font-bold text-sm">Código Patrimonial:</label>
                <input type="text" id="codigo_patrimonial" name="codigo_patrimonial"
                       class="w-full border-gray-300 rounded-md p-2 text-sm">
            </div>
        </div>

        <!-- Tercera fila: Asunto -->
        <div class="w-full mb-2">
            <label for="asunto" class="block mb-1 font-bold text-sm">Asunto:</label>
            <input type="text" id="asunto" name="asunto"
                   class="w-full border-gray-300 rounded-md p-2 text-sm">
        </div>
        <!-- Número de Documento -->
        <div class="w-full mb-2">
            <label for="numero_documento" class="block mb-1 font-bold text-sm">Número de Documento:</label>
            <input type="text" id="numero_documento" name="numero_documento"
                   class="w-full border-gray-300 rounded-md p-2 text-sm">
        </div>
        <!-- Cuarta fila: Documento -->
        <div class="w-full mb-2">
            <label for="documento" class="block mb-1 font-bold text-sm">Documento:</label>
            <input type="file" id="documento" name="documento"
                   class="w-full border-gray-300 rounded-md p-2 text-sm">
        </div>

        <!-- Quinta fila: Descripción -->
        <div class="w-full mb-2">
            <label for="descripcion" class="block mb-1 font-bold text-sm">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4"
                      class="w-full border-gray-300 rounded-md p-2 resize-none text-sm"></textarea>
        </div>

        <!-- Botónes -->
        <div class="flex justify-center space-x-4">
            <button type="submit"
                    class="bg-green-500 text-white hover:bg-[#b1f774] font-bold py-2 px-4 rounded bg-[#87cd51] text-sm">
                Registrar
            </button>
            
        </div>

    </form>
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
                var select = $('#numero_incidencia');
                select.empty();
                select.val(data.INC_codigo);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
</script>
</html>
