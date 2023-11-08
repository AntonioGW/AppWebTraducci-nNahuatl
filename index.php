<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$aidi=$_SESSION["id"];
require_once "config.php";      

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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body id="Pagina">
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
              <a class="nav-link" href="update.php">Mi cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./historial.php">Historial</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="./reset-password.php">Reestablecer contraseña</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="container" style="background-color: #F0F8FF; padding: 20px;">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <h2 class="text-center mb-4">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido.</h2>
            <form action="index.php">
            <div class="form-group" style="background-color: #d4efca; padding: 20px;">
              <label for="texto">Prompt:</label>
              <input hidden type="text" name="ide" class="form-control" value="<?php echo $aidi ?>">
              <input type="text" name="texto" class="form-control" id="prompt">
            </div>
            <button type="button" name="generar" class="btn btn-primary" id="generate">Generar</button>
            <p id="output" class="mt-4"></p>
          </div>
          </form>
        </div>
    </div>
      <!-- Agregar enlaces a los scripts de Bootstrap -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <script src="./app.js"></script>
</body>
</html>