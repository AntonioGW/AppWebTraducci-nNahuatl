<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

$id_consulta = $_SESSION["id"];

require_once "config.php";
$sql = "SELECT * FROM usuarios WHERE id= '" . $id_consulta . "'";


$res = $link->query($sql);

while ($data = $res->fetch_assoc()) {
  $id_actualizar = $data['id'];
  $nombre_view = $data['nombre'];
  $correo_view = $data['correo'];
  $colegio_view = $data['colegio'];
  $idioma_view = $data['idioma'];
}


?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Mis datos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style type="text/css">
    .btn {
      background-color: #04D66A;
      color: black;
    }

    .btn1:hover {
      background-color: #0d0c22;
      color: #04D66A;
      border-color: #04D66A;
    }

    .form-group {
      color: #0d0c22;
    }

    .text-center {
      color: #0d0c22;
    }

    .txt {
      color: #04D66A;
    }

    .nav-txt {
      color: #04D66A;
    }

    .link-p {
      color: #133357;
    }

    .link-p:hover {
      color: #04D66A;
      ;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d0c22 ;">
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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center txt">Mis datos</h2>
        <form action="update.php" method="post">
          <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre_view ?>" disabled>
          </div>
          <div class="form-group">
            <label>Correo:</label>
            <input type="text" name="username" class="form-control" value="<?php echo $correo_view ?>" disabled>
          </div>
          <div class="form-group">
            <label>Colegio o Institución:</label>
            <input type="text" name="colegio" class="form-control" value="<?php echo $colegio_view ?>" disabled>
          </div>
          <div class="form-group">
            <label>Idioma:</label>
            <input type="text" name="idioma" class="form-control" value="<?php echo $idioma_view ?>" disabled>




          </div>
          <div class="text-center">
            <a class="link-p" href="update-complement.php?id=<?php echo $id_actualizar ?>">Actualizar</a>

          </div>
        </form>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>