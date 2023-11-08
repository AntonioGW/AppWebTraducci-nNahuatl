<?php
if (!empty($_POST["generar"])) {
    if (!empty($_POST["text0"])) {
        $pregunta = $_POST["texto"];
        $aidi2 = $_POST["ide"];
        $sql = "INSERT INTO users (texto) VALUES ('$pregunta') WHERE id=$aidi2";
    } else {
        $err = "Nada";
    }
    
}
?>