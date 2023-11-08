<?php
$conn = mysqli_connect("localhost", "root", "", "traductorweb");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$idUsuario = 1; // ID del usuario a mostrar

$sql = "SELECT * FROM users WHERE id = $idUsuario";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
}
if ($usuario) { 
    echo "Nombre: " . $usuario['name'] . "<br>";
    echo "Email: " . $usuario['email'] . "<br>";
    echo "College: " . $usuario['college'] . "<br>";
    echo "Lenguaje: " . $usuario['language'] . "<br>";
    // Otros campos a mostrar
} else {
    echo "Usuario no encontrado";
}
mysqli_close($conn);
?>