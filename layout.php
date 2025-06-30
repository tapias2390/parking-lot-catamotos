<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Panel | Parqueadero JT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap 5 -->
    <link href="libs/bootstrap.min.css" rel="stylesheet" />
    <!-- Estilos del sidebar -->
    <link href="css_parking/sidebar.css" rel="stylesheet" />
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <!-- SVG de moto -->
            <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <path fill="#333"
                    d="M592 320h-16l-40-128H344l32-64h48v-32h-64l-64 128h216l20.5 64H464c-35.3 0-64 28.7-64 64 0 26.5 16.7 49.1 40 58.3V480h32v-60.3c23.3-9.2 40-31.8 40-58.3h64v-32zM168 320c-35.3 0-64 28.7-64 64 0 26.5 16.7 49.1 40 58.3V480h32v-37.7c23.3-9.2 40-31.8 40-58.3s-28.7-64-64-64zm0 96c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z" />
            </svg>
            <h4>Parqueadero JT</h4>
        </div>

        <ul class="menu-list">
            <li><a href="ccDashboard.php"><span class="icon">🏠</span> Dashboard</a></li>
            <li><a href="index.php"><span class="icon">🚗</span> Parqueadero</a></li>
            <li><a href="lavadas.php"><span class="icon">💧</span> Lavadas</a></li>
            <li><a href="ingresos.php"><span class="icon">💰</span> Ingresos</a></li>
            <li><a href="gastos.php"><span class="icon">📉</span> Gastos</a></li>
            <li><a href="gastosFijos.php"><span class="icon">🧾</span> Gastos Fijos</a></li>
            <li><a href="historial.php"><span class="icon">📜</span> Historial</a></li>
            <li><a href="caja.php"><span class="icon">🐷</span> Caja</a></li>
        </ul>

        <div class="sidebar-footer">
            <img src="https://i.pravatar.cc/40?img=68" alt="Usuario" class="avatar" />
            <div class="user-info">
                <strong>Jordan Alexander</strong><br />
                <span>Cuenta Free</span>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="main-content">
        <!-- Botón siempre visible para abrir/cerrar -->
        <button id="toggle-sidebar-btn" class="toggle-btn btn btn-outline-dark m-2">
            <!-- Icono hamburguesa / cruz se invierte con CSS -->
            <span class="bar top"></span>
            <span class="bar middle"></span>
            <span class="bar bottom"></span>
        </button>

        <div class="container-fluid mt-4">
            <?php include('gastosFijos.php'); ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="libs/jquery.min.js"></script>
    <script src="libs/bootstrap.min.js"></script>
    <script src="js_parking/sidebarToggle.js"></script>
    <script src="js_parking/gastosFijos.js"></script>
</body>

</html>