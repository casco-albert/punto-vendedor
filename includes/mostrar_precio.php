<?php
include 'db.php';

$db = new DB();
$pdo = $db->connect();

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("SELECT precio, puntos FROM productos WHERE id = ?");
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $precio = $result["precio"];
        $punto = $result["puntos"];

        $precio_js = json_encode($precio);
        $puntos_js = json_encode($punto);
        echo '<script>document.getElementById("punto").value = ' . $puntos_js . ';</script>';
        echo '<script>document.getElementById("precio").value = ' . $precio_js . ';</script>';
        echo '<script>console.log("Punto:", ' . json_encode($punto) . ');</script>';
    } else {
        echo '<script>console.log("No se encontró el producto");</script>';
    }

} else {
    echo '<script>console.log("ID no definido");</script>';
}

?>




