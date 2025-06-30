<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel | Parqueadero JT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="libs/bootstrap.min.css" rel="stylesheet">
    <link href="css_parking/sidebar.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark text-white border-end" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4">🅿️ Parqueadero JT</div>
            <div class="list-group list-group-flush">
                <a href="ccDashboard.php" class="list-group-item list-group-item-action bg-dark text-white">🏠 Dashboard</a>
                <a href="index.php" class="list-group-item list-group-item-action bg-dark text-white">🚗 Parqueadero</a>
                <a href="lavadas.php" class="list-group-item list-group-item-action bg-dark text-white">💧 Lavadas</a>
                <a href="ingresos.php" class="list-group-item list-group-item-action bg-dark text-white">💰 Ingresos</a>
                <a href="gastos.php" class="list-group-item list-group-item-action bg-dark text-white">📉 Gastos</a>
                <a href="historial.php" class="list-group-item list-group-item-action bg-dark text-white">📜 Historial</a>
                <a href="caja.php" class="list-group-item list-group-item-action bg-dark text-white">🐷 Caja</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-outline-secondary" id="menu-toggle">☰</button>
            </nav>

            <div class="container-fluid mt-4">
                <?php

                include('gastosFijos.php');
                ?>
            </div>
        </div>
    </div>

    <script src="libs/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>

    <script src="js_parking/gastosFijos.js"></script>

    <script>
        $("#menu-toggle").click(function() {
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>