<?php
if (isset($_POST['save'])) {
    $id_vendedor = $_POST['vendedor'];

    $codigo = $_POST['codigo'];
    $fecha = $_POST['fecha'];
    $precio = $_POST['precio'];
    $punto = $_POST['punto'];

    $dsn = 'mysql:host=localhost;dbname=db_puntos';
    $usuario = 'root';
    $contraseña = '';

    try {
        $pdo = new PDO($dsn, $usuario, $contraseña);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener puntos actuales del vendedor
        $stmt = $pdo->prepare("SELECT ven_puntos FROM vendedor WHERE id = ?");
        $stmt->execute([$id_vendedor]);
        $puntos_actuales = intval($stmt->fetchColumn());
        $punto = intval($punto);

        // Insertar venta
        $stmt = $pdo->prepare("INSERT INTO ventas (ven_id, producto, fecha, monto, punto_prod) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$id_vendedor, $codigo, $fecha, $precio, $punto]);

        // Actualizar puntos del vendedor
        $nuevos_puntos = $puntos_actuales + $punto;
        $stmt = $pdo->prepare("UPDATE vendedor SET ven_puntos = ? WHERE id = ?");
        $stmt->execute([$nuevos_puntos, $id_vendedor]);

        echo 'Compra guardada correctamente.';
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
    }
}
?>
