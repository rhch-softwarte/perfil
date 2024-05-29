<?php
// Configura los detalles de tu conexión MySQL
$servidor = "localhost";
$usuario = "root";
$contraseña = "root91";
$basededatos = "quejas";

// Crea una conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $contraseña, $basededatos);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtén los datos del formulario de manera segura
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Prepara la consulta SQL para insertar los datos en la tabla (evitando SQL Injection)
$sql = $conn->prepare("INSERT INTO quejas_sugerencias (nombre, correo, mensaje) VALUES (?, ?, ?)");
$sql->bind_param("sss", $nombre, $correo, $mensaje);

// Ejecuta la consulta
if ($sql->execute()) {
    echo '<script>
    alert("Se han enviado tus quejas y sugerencias correctamente.");
    window.location = "../index.html";
    </script>';
} else {
    echo "Error al enviar tus quejas y sugerencias: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
