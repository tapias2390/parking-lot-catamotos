<?php
include('../conn.php');
date_default_timezone_set('America/Bogota');

// Validar conexión
if (!$conn) {
    echo json_encode([
        "tabla" => "<div class='alert alert-danger'>Error de conexión a la base de datos.</div>",
        "total" => ""
    ]);
    exit;
}

// ======================
// GUARDAR GASTO FIJO
// ======================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'guardar') {
    $descripcion = trim(mysqli_real_escape_string($conn, $_POST['descripcion'] ?? ''));
    $valor = floatval($_POST['valor'] ?? 0);

    if (!$descripcion || $valor <= 0) {
        echo "⚠ Todos los campos son obligatorios y el valor debe ser mayor que 0.";
        exit;
    }

    $sql = "INSERT INTO gastos_fijos (descripcion, valor, fecha_creacion) 
            VALUES ('$descripcion', $valor, NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Gasto registrado con éxito.";
    } else {
        echo "❌ Error al guardar el gasto.";
    }
    exit;
}

// ======================
// CONSULTAR ENTRE FECHAS
// ======================
if (isset($_POST['action']) && $_POST['action'] === 'consultar') {
    $fecha_inicio = $_POST['fecha_inicio'] ?? date('Y-m-01');
    $fecha_fin    = $_POST['fecha_fin'] ?? date('Y-m-d');

    // Validaciones
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha_inicio) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha_fin)) {
        echo json_encode([
            "tabla" => "<div class='alert alert-danger'>⚠ Formato de fecha inválido.</div>",
            "total" => ""
        ]);
        exit;
    }

    if ($fecha_inicio > $fecha_fin) {
        echo json_encode([
            "tabla" => "<div class='alert alert-warning'>⚠ La fecha de inicio no puede ser mayor que la fecha final.</div>",
            "total" => ""
        ]);
        exit;
    }

    $query = mysqli_query($conn, "
        SELECT * FROM gastos_fijos 
        WHERE DATE(fecha_creacion) BETWEEN '$fecha_inicio' AND '$fecha_fin' 
        ORDER BY fecha_creacion DESC
    ");

    $i = 0;
    $total = 0;
    $html = '<table class="table table-striped table-bordered align-middle">
        <thead class="table-primary text-center">
            <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>Fecha y Hora</th>
                <th>Valor</th>
            </tr>
        </thead><tbody>';

    while ($row = mysqli_fetch_assoc($query)) {
        $i++;
        $valor = number_format($row['valor'], 0, ',', '.');
        $total += $row['valor'];
        $fecha = date('Y-m-d h:i A', strtotime($row['fecha_creacion']));
        $html .= "<tr>
                    <td>$i</td>
                    <td>{$row['descripcion']}</td>
                    <td>$fecha</td>
                    <td>$ $valor</td>
                </tr>";
    }

    if ($i === 0) {
        $html .= "<tr><td colspan='4' class='text-center text-muted'>No se encontraron registros.</td></tr>";
    }

    $html .= '</tbody></table>';

    echo json_encode([
        "tabla" => $html,
        "total" => "Total: $" . number_format($total, 0, ',', '.')
    ]);
    exit;
}

// ======================
// SI NO HAY ACCIÓN
// ======================
echo json_encode([
    "tabla" => "<div class='alert alert-info'>No se ha especificado una acción válida.</div>",
    "total" => ""
]);
exit;
