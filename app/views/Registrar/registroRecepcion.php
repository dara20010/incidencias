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
        <h1 class="text-xl font-bold mb-4">Registro de Recepción</h1>
        <!-- Tabla de datos desde la base de datos -->
        <div class="mb-8">

</div>
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
                            <span class=""></span>
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
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>


        <!-- Formulario -->
        <div class="mb-8 mt-8">
            <h2 class="text-lg font-bold mb-2">Formulario</h2>
            <form action="ruta_para_procesar_formulario.php" method="POST">
                <div class="flex flex-wrap -mx-2 mb-4">
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="num_recepcion" class="block font-bold mb-1">Num Recepcion:</label>
                        <input type="text" id="num_recepcion" name="num_recepcion" class="border p-2 w-full text-sm">
                    </div>
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="fecha_recepcion" class="block font-bold mb-1">Fecha de Recepcion:</label>
                        <input type="date" id="fecha_recepcion" name="fecha_recepcion" class="border p-2 w-full text-sm">
                    </div>
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="usuario" class="block font-bold mb-1">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="border p-2 w-full text-sm">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-4">
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="hora" class="block font-bold mb-1">Hora:</label>
                        <input type="time" id="hora" name="hora" class="border p-2 w-full text-sm">
                    </div>
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="prioridad" class="block font-bold mb-1">Prioridad:</label>
                        <select id="prioridad" name="prioridad" class="border p-2 w-full text-sm">
                        </select>
                    </div>
                    <div class="w-full md:w-1/3 px-2 mb-4">
                        <label for="impacto" class="block font-bold mb-1">Impacto:</label>
                        <select id="impacto" name="impacto" class="border p-2 w-full text-sm">
                        </select>
                    </div>
                </div>


                <!-- Botones del formulario -->
                <div class="flex justify-center space-x-4">
                    <button type="submit" class="bg-[#87cd51] text-white font-bold hover:bg-[#8ce83c] py-2 px-4 rounded">Registrar</button>
                    <button type="button" class="bg-blue-500 text-white font-bold hover:bg-[#4c8cf5] py-2 px-4 rounded">Imprimir</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>