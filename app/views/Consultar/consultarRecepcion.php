<!DOCTYPE html>
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

<body>

<!-- Contenido principal -->
<main class="bg-[#eeeff1] flex-1 p-4 overflow-y-auto">
    <!-- Header -->
    <h1 class="text-xl font-bold mb-4">Consultar Recepcion</h1>

    <!-- Formulario -->
    <div class="mb-8 mt-8">
        <form action="consultar-recepcion.php?action=consultar" method="POST">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                    <label for="numero_i
                    ncidencia" class="block mb-1 font-bold text-sm">Nro de Recepcion:</label>

                    <input type="text" id="numero_incidencia" name="numero_incidencia"
                           class="w-full border-gray-300 rounded-md p-2 text-sm">

                </div>
                <div class="w-full md:w-1/3 px-2 mb-2">
                    <label for="area" class="block mb-1 font-bold text-sm">Área:</label>
                    <select id="area" name="area"
                            class="w-full border-gray-300 rounded-md p-2 text-sm">
                    </select>

                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-2">
                    <label for="fecha" class="block mb-1 font-bold text-sm">Fecha:</label>
                    <input type="date" id="fecha" name="fecha"
                           class="w-full border-gray-300 rounded-md p-2 text-sm">
                </div>
            </div>

            <!-- Botones del formulario -->
            <div class="flex justify-center space-x-4">
                <button type="button" class="bg-blue-500 text-white font-bold hover:bg-[#4c8cf5] py-2 px-4 rounded">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- RESULTADOS -->
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-lime-300">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Num Incidencia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Código Patrimonial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prioridad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Incidencia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asunto
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        1
                    </th>
                    <td class="px-6 py-4">
                        COD123
                    </td>
                    <td class="px-6 py-4">
                        Asistencia Técnica
                    </td>
                    <td class="px-6 py-4">
                        Alta
                    </td>
                    <td class="px-6 py-4">
                        30-11-2023
                    </td>
                    <td class="px-6 py-4">
                        .....
                    </td>
                </tr>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        1
                    </th>
                    <td class="px-6 py-4">
                        COD123
                    </td>
                    <td class="px-6 py-4">
                        Asistencia Técnica
                    </td>
                    <td class="px-6 py-4">
                        Alta
                    </td>
                    <td class="px-6 py-4">
                        30-11-2023
                    </td>
                    <td class="px-6 py-4">
                        .....
                    </td>
                </tr>
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        1
                    </th>
                    <td class="px-6 py-4">
                        COD123
                    </td>
                    <td class="px-6 py-4">
                        Asistencia Técnica
                    </td>
                    <td class="px-6 py-4">
                        Alta
                    </td>
                    <td class="px-6 py-4">
                        30-11-2023
                    </td>
                    <td class="px-6 py-4">
                        .....
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

</main>

</body>

</html>