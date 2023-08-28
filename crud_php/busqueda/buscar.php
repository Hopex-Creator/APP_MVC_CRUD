<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda desde la solicitud AJAX
$searchTerm = $_GET['query'];

// Consulta a la base de datos
$sql = "SELECT * FROM producto WHERE nombre LIKE '%$searchTerm%'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo '<p>' . $row['nombre'] . '</p>';
    }
} else {
    echo 'No se encontraron resultados.';
}

$conn->close();
?>