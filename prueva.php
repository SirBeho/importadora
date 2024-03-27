<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas con Bootstrap</title>
    <!-- Carga de estilos de Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/output.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.10/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.10/js/dataTables.bootstrap5.min.js"></script>
</head>

<body class="bg-gray-900 text-white">

    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-4">Tablas con Bootstrap</h1>
        <button id="toggleMode" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
            Alternar Modo
        </button>
        <table id="miTabla" class="table table-light mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jane Smith</td>
                    <td>28</td>
                </tr>
                <!-- Agrega más filas aquí si es necesario -->
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            var darkMode = false;

            $('#toggleMode').click(function() {
                darkMode = !darkMode;
                if (darkMode) {
                    $('#miTabla').removeClass('table-light');
                    $('#miTabla').addClass('table-dark');
                } else {
                    $('#miTabla').removeClass('table-dark');
                    $('#miTabla').addClass('table-light');
                }
            });

            $('#miTabla').DataTable();
        });
    </script>

</body>

</html>
