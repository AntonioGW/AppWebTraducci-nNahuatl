<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

require_once "config.php";
$param_id = $_SESSION["id"];
$nombre = $nombre_vacio = "";
$usuario = $usuario_vacio = "";
$colegio = $colegio_vacio = "";
$idioma = $idioma_vacio = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //validar si esta vacio el nombre
  if (empty(trim($_POST["nombre"]))) {
    $nombre_vacio = "Por favor ingrese un nombre";
  } else {
    $nombre = trim($_POST["nombre"]);
  }

  //validar si esta vacio el usuario
  if (empty(trim($_POST["username"]))) {
    $usuario_vacio = "Por favor ingrese un usuario";
  } else {
    $usuario = trim($_POST["username"]);
  }

  //validar si esta vacio el colegio
  if (empty(trim($_POST["colegio"]))) {
    $colegio_vacio = "Por favor ingrese un colegio";
  } else {
    $colegio = trim($_POST["colegio"]);
  }

  //validar si esta vacio el idioma
  if (empty(trim($_POST["idioma"]))) {
    $idioma_vacio = "Por favor ingrese un idioma";
  } else {
    $idioma = trim($_POST["idioma"]);
  }

  if (empty($nombre_vacio) && empty($usuario_vacio) && empty($colegio_vacio) && empty($idioma_vacio)) {
    $sql = "UPDATE usuarios SET nombre = '$nombre', correo='$usuario', colegio='$colegio', idioma='$idioma' WHERE id = $param_id";

    $link->query($sql);

    if ($sql == true) {
      session_destroy();
      header("location: login.php");
      exit();
    } else {
      echo "Algo salió mal, por favor vuelva a intentarlo.";
    }
  }
}

?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Actualizar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style type="text/css">
    .btn {
      background-color: #04D66A;
      color: white;
    }

    .btn1:hover {
      background-color: #0d0c22;
      color: #04D66A;
      border-color: #04D66A;
    }

    .form-group {
      color: #133357;
    }

    .text-center {
      color: #0d0c22;
    }
    .err {
            color: #04D66A;
        }

    .txt {
      color: #133357;
    }
    .titulo{
      color: #04D66A;
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
      background-color: #E8E8E8;
    }

    .txt-alerta {
      color: black;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg " style="background-color: #0d0c22;">
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
        <h2 class="text-center titulo">Actualizar mis datos datos</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div hidden class="form-group">
            <input type="text" name="txtid" class="form-control">
          </div>
          <div class="form-group" style="color:#133357;">
            <label class="txt">Nombre:</label>
            <input type="text" name="nombre" class="form-control">
            <span class="help-block err"><?php echo $nombre_vacio; ?></span>
          </div>
          <div class="form-group">
            <label class="txt">Correo:</label>
            <input type="text" name="username" class="form-control">
            <span class="help-block err"><?php echo $usuario_vacio; ?></span>
          </div>
          <div class="form-group">
            <label class="txt">Colegio o Institución:</label>
            <input type="text" name="colegio" class="form-control">
            <span class="help-block err"><?php echo $colegio_vacio; ?></span>
          </div>
          <div class="form-group">
            <label class="txt">Idioma:</label>
            <input type="text" name="idioma" class="form-control">
            <span class="help-block err"><?php echo $idioma_vacio; ?></span>


          </div>
          <div class="text-center ">
            <input type="submit" name="Actualizar" class="btn btn1" value="Actualizar">

          </div>
        </form>
        <a class="link-p" href="update.php">Cancelar</a>
        <br>
        <br>
        <br>
        <div class="alert alerta txt-alerta" role="alert">ATENCION: Si modificas tu usuario, se cerrará tu sesión y tendras que ingresar nuevamente</div>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>