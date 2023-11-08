<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$id_consulta = $_SESSION["id"];

require_once "config.php";
$sql = "SELECT * FROM users WHERE id= '".$id_consulta."'";


$res = $link->query($sql);

while ($data=$res->fetch_assoc()) {
  $id_actualizar = $data['id'];
  $nombre_view = $data['nombre'];
  $correo_view = $data['username'];
  $colegio_view = $data['colegio'];
  $idioma_view = $data['idioma'];
}


?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
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
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Mi cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="historial.php">Historial</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="reset-password.php">Reestablecer contraseña</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </nav>




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Mis datos</h2>
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label >Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $nombre_view ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label >Correo:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $correo_view ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label >Colegio o Institución:</label>
                        <input type="text" name="colegio" class="form-control" value="<?php echo $colegio_view ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Idioma:</label>
                        <input type="text" name="idioma" class="form-control" value="<?php echo $idioma_view ?>" disabled >
                    
                        
                        
                        
                    </div>
                    <div class="text-center">
                    <button type="button" class="btn btn-outline-success"><a href="update-complement.php">Actualizar</a></button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>