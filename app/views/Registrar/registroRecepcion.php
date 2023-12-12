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
    <h1 class="text-xl font-bold text-gray-800 mb-4">Registro de Recepción</h1>
    <!-- Tabla de datos desde la base de datos -->

    <div>
        <div class="relative max-h-[200px] overflow-x-hidden shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="sticky
                     top-0 text-xs text-gray-700 uppercase bg-lime-300">
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
                    <!--<th scope="col" class="px-6 py-3">
                        Prioridad
                    </th>-->
                    <th scope="col" class="px-6 py-3">
                        Fecha Incidencia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asunto
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once './app/models/IncidenciaModel.php';
                $incidenciaModel = new IncidenciaModel();
                $incidencias = $incidenciaModel->obtenerIncidenciasSinRecepcionar();
                foreach ($incidencias as $incidencia) {
                    echo "<tr class='bg-white hover:bg-green-100 hover:scale-[101%] transition-all hover:cursor-pointer border-b '>";
                    echo "<th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap '>";
                    echo $incidencia['INC_codigo'];
                    echo "</th>";
                    echo "<td class='px-6 py-4'>";
                    echo $incidencia['INC_codigoPatrimonial'];
                    echo "</td>";
                    echo "<td class='px-6 py-4'>";
                    echo $incidencia['CAT_codigo'];
                    echo "</td>";
                    /*echo "<td class='px-6 py-4'>";
                    echo $incidencia['PRI_codigo'];
                    echo "</td>";*/
                    echo "<td class='px-6 py-4'>";
                    echo $incidencia['INC_fecha'];
                    echo "</td>";
                    echo "<td class='px-6 py-4'>";
                    echo $incidencia['INC_asunto'];
                    echo "</td>";
                    echo "</tr>";
                }

                ?>


                </tbody>
            </table>
        </div>

    </div>


    <!-- Formulario -->
    <div class="bg-white shadow-md p-4 mb-8 mt-8 rounded-lg">
        <form action="registro-recepcion.php?action=registrar" method="POST">
            <input type="hidden" class="border bg-white p-2 w-full text-sm" id="INC_codigo" name="INC_codigo">
            <div class="flex justify-center mx-2 mb-4">
                <div class="flex-1 max-w-[500px] px-2 mb-2 flex items-center">
                    <label for="INC_codigo_visible" class="block font-bold mb-1 mr-1 text-lime-500">Nro Incidencia:</label>
                    <input disabled type="text" class="w-20 border border-gray-200 bg-gray-100 rounded-md p-2 text-sm" id="INC_codigo_visible"
                           name="INC_codigo_visible">
                </div>
            </div>
            <div class="flex flex-wrap -mx-2 mb-2">
                <div class="w-full md:w-1/3 px-2 mb-2">
                    <label for="num_recepcion" class="block font-bold mb-1">Num Recepcion:</label>
                    <input type="text" id="num_recepcion" name="num_recepcion" class="border p-2 w-full text-sm">
                </div>
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="fecha_recepcion" class="block font-bold mb-1">Fecha de Recepcion:</label>
                    <input type="date" id="fecha_recepcion" name="fecha_recepcion" class="border p-2 w-full text-sm" readonly
                           disabled>
                </div>
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="usuario" class="block font-bold mb-1">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" class="border p-2 w-full text-sm">
                </div>
            </div>

            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="hora" class="block font-bold mb-1">Hora:</label>
                    <input type="time" id="hora" name="hora" class="border p-2 w-full text-sm" readonly
                           disabled>
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
                <button type="submit"
                        id="submitButton"
                        class="bg-[#87cd51] text-white font-bold hover:bg-[#8ce83c] py-2 px-4 rounded">
                    Registrar
                </button>

            </div>
        </form>
    </div>
</main>

</body>

<script>
    $(document).ready(function () {
        console.log("FETCHING")
        $.ajax({
            url: '../../../ajax/getPrioridadData.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var select = $('#prioridad');
                select.empty();
                $.each(data, function (index, value) {
                    select.append('<option value="' + value.PRI_codigo + '">' + value.PRI_nombre + '</option>');
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
            url: '../../../ajax/getImpactoData.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var select = $('#impacto');
                select.empty();
                $.each(data, function (index, value) {
                    select.append('<option value="' + value.IMP_codigo + '">' + value.IMP_nombre + '</option>');
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    // add a listener to every row of the table, so that when it is clicked, it will fill the hidden input with id INC_codigo with the value of the first column of the row
    $(document).ready(function () {
        $('tr').click(function () {
            var id = $(this).find('th').html();
            $('tr').removeClass('bg-blue-200 font-semibold');
            $(this).addClass('bg-blue-200 font-semibold');
            $('#INC_codigo').val(id);
            $('#INC_codigo_visible').val(id);
        });
    });

    $(document).ready(function () {
        $('#submitButton').click(function () {
            var form = $('form');
            var data = form.serialize();
            console.log(data);
        });
    });

    $(document).ready(function () {
        console.log("FETCHING")
        $.ajax({
            url: '../../../ajax/getLastRecepcion.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var input = $('#num_recepcion');
                input.empty();
                input.val(data.REC_codigo);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
</script>
</html>