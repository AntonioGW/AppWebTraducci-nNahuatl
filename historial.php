<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Botón de menú en una página web</title>
  <!-- Agregar enlaces a las hojas de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">IA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./Acount.html">Mi cuenta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./index2.html">Historial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./reset-password.php">Reestablecer contraseña</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
      </ul>
    </div>
  </nav>


  <div text-aling: center>
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="conversation.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Conversación 1</h5>
      <p class="card-text">Para ver la conversación de un clic en el botón</p>
      <a href="#" class="btn btn-info">Ver</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="conversation.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Conversación 1</h5>
      <p class="card-text">Para ver la conversación de un clic en el botón</p>
      <a href="#" class="btn btn-info">Ver</a>
    </div>
  </div>


</div>


  <!-- Agregar enlaces a los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
