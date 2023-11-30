<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

$id_historial = $_SESSION["id"];

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Historial</title>
  <!-- Agregar enlaces a las hojas de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style type="text/css">
    .btn {
      background-color: #04D66A;
      color: black;
    }

    .btn1:hover {
      background-color: #133357;
      color: white;
      border-color: #04D66A;
    }

    .form-group {
      color: #133357;
    }

    .text-center {
      color: #0d0c22;
    }

    .txt {
      color: #133357;
    }

    .link-p {
      color: #0d0c22;
    }

    .link-p:hover {
      color: #04D66A;
      ;
    }

    .nav-txt {
      color: #04D66A;
    }

    .alerta {
      background-color: #133357;
    }

    .txt-alerta {
      color: white;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #0d0c22 ;">
    <a class="navbar-brand" href="/index.php" style="color:#04D66A;">IA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./index.php" style="color:#04D66A;">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="update.php" style="color:#04D66A;">Mi cuenta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./historial.php" style="color:#04D66A;">Historial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./reset-password.php" style="color:#04D66A;">Reestablecer contraseña</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color:#04D66A;">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
  require_once "config.php";
  $sql2 = "SELECT `id`, `idUsuario`, `pregunta`, `respuesta` FROM `consultas` WHERE idUsuario= '" . $id_historial . "'";
  $resultSet = mysqli_query($link, $sql2);
  while ($row = mysqli_fetch_row($resultSet)) {
  ?>
  <div class="container">
  <div class="card">
      <h5 class="card-header">Consulta</h5>
      <div class="card-body" style="background-color: #0d0c22;">
        <h5 class="card-title" style="color: #04D66A;"><?php echo $row[2] ?></h5>
        <p id="texto" class="card-text" style="color: white;"> <?php echo $row[3] ?> </p>
        
      </div>
    </div>
  </div>
    
  <?php
  }
  ?>

  <!-- Agregar enlaces a los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
  <script src="./copiar-texto.js"></script>
</body>

</html>