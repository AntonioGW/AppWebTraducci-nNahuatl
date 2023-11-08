<?php
// Conectar a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traductorweb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password']; 
$college = $_POST['college'];
$language = $_POST['language'];

// Insertar el usuario en la base de datos
$sql = "INSERT INTO users (name, email, password, college, language) VALUES ('$name', '$email', '$hashed_password', '$college', '$language')";
if ($conn->query($sql) === TRUE) {
    header("Location: InicioSesion.html");
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
