<?php


if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["categoria"]) && !empty($_POST["stock"]) && !empty($_POST["precio"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        
        $sql = $conexion->query("UPDATE producto SET nombre='$nombre', categoria='$categoria', stock=$stock, precio='$precio' WHERE id=$id");
        
        if ($sql == 1) {
            echo '<meta http-equiv="refresh" content="0;index.php">';
            exit; // Detener la ejecución después de la redirección
        } else {
            echo "<div class='alert alert-warning'>Error al modificar producto</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
?>
