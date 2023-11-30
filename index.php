<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}



require_once "config.php";
$id_index = $_SESSION["id"];
$p = $p_err = "";
$r = $r_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["textop"]))) {
    $p_err = "Primero haga una pregunta";
  } else {
    $p = trim($_POST["textop"]);
  }

  if (empty(trim($_POST["textor"]))) {
    $r_err = "Primero haga una pregunta";
  } else {
    $r = trim($_POST["textor"]);
  }

  if (empty($p_err) && empty($r_err)) {
    $sql = "INSERT INTO consultas (idUsuario, pregunta, respuesta) VALUES ('$id_index', '$p', '$r')";

    if ($link->query($sql) === TRUE) {
      header("location: index.php");
  } else {
      echo "Error al insertar el registro: " . $link->error;
  }
  }
  
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
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
      color: #0d0c22;
    }

    .text-center {
      color: #0d0c22;
    }

    .mt-3 {
      color: #0d0c22;
    }

    .nav-txt {
      color: #04D66A;
    }

    .titulo {
      color: black;
    }

    .nombre-usuario {
      color: #04D66A;
    }

    .err {
      color: #0d0c22;
    }

    .fondo {
      background-color: #E8E8E8;
    }

    .bordes {
      border-radius: 15px;
    }

    .margen {
      padding: 10px;
    }
  </style>
</head>

<body id="Pagina">
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

  <div class="container fondo bordes" style="padding-top: 20px;">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4 titulo">Hola, <b class="nombre-usuario"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido.</h2>
        <form id="form-pergunta-chat" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="form-group" style="background-color: #04D66A; padding: 20px;">
            <p class="mt-4" style="background-color: #04D66A;">Prompt:</p>
            <textarea hidden cols="65"></textarea>
            <input id="campo-pergunta" type="text" name="texto" class="form-control">
            
          </div>
          
          <input type="button" id="btn-pergunta-chat" class="btn btn1" value="Generar">
          <button type="button" onclick="mostrarEtiqueta()" class="btn btn1">Ver respuesta</button><br> <br>

          <p id="pergunta1" class="mt-4 margen" style="background-color: #04D66A; "></p>
          <p id="resposta1" class="mt-4 margen" style="background-color: #04D66A; "></p>
          <input hidden id="pergunta" type="text" name="textop" class="form-control"><br>
          <input hidden id="resposta" type="text" name="textor" class="form-control" ><br>
          <input  type="submit" id="btn-pergunta-chat" class="btn btn1" value="Guardar">
          
          

      </div>
      </form>
  </div>
  <!-- Agregar enlaces a los scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

  <script src="./app.js"></script>
  <script src="./copiar-texto.js"></script>

  <script>
    function mostrarEtiqueta(){
      const valorInput = document.getElementById('pergunta').value;
      const valorInput2 = document.getElementById('resposta').value;

      document.getElementById('pergunta1').innerText = `La pregunta es: ${valorInput}`;
      document.getElementById('resposta1').innerText = `La respuesta es: ${valorInput2}`;
    }
  </script>
</body>

</html>