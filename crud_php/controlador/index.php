<?php

if(!empty($_POST["btnInsertar"])) {
    if(!empty($_POST["nombre"]) and !empty($_POST["categoria"]) and !empty($_POST["stock"]) and !empty($_POST["precio"])){
        
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $sql=$conexion->query("insert into producto(nombre, categoria, stock, precio) values('$nombre', '$categoria', $stock, '$precio') ");
        if ($sql==1){
            echo '<div class="alert alert-succes ">Producto registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger ">Error al registrar producto</div>';
        }

    }else{
        echo '<div class="alert alert-warning ">Debe rellenar todos los campos</div>';
    }
}

?>