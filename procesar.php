<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha enviado el formulario usando el método POST

    // Toma el valor del campo oculto "textoParrafo" del formulario
    $textoParrafo = $_POST["textoParrafo"];

    // Ahora puedes hacer lo que quieras con la variable $textoParrafo
    echo "El texto del párrafo es: " . $textoParrafo;
}
?>