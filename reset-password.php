<?php

session_start();


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


require_once "config.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }


    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }


    if (empty($new_password_err) && empty($confirm_password_err)) {

        $sql = "UPDATE usuarios SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);


            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];


            if (mysqli_stmt_execute($stmt)) {

                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }


        mysqli_stmt_close($stmt);
    }


    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style type="text/css">
        .btn1 {
            background-color: #04D66A;
            color: white;

        }

        .btn2 {
            background-color: #FF5733;
            color: black;

        }

        .btn1:hover {
            background-color: #0d0c22;
            color: #04D66A;

        }

        .btn2:hover {
            background-color: #FF5733;
            color: white;

        }

        .err {
            color: #04D66A;
        }

        .fondo {
            background-color: #E8E8E8;
        }

        .bordes {
            border-radius: 15px;
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


    <br>
    <br>
    <br>
    <br>


    <div class="container fondo bordes">

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">

                <h2 class="text-center">Crea una nueva contraseña</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div hidden class="form-group">
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                        <label>Nueva contraseña:</label>
                        <input type="password" name="new_password" class="form-control">
                        <span class="help-block"><?php echo $new_password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirmar contraseña:</label>
                        <input type="password" name="confirm_password" class="form-control">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="text-center ">
                        <input type="submit" name="Actualizar" class="btn btn1" value="Actualizar">
                    </div>
                </form>
                <p class="text-center mt-3"><a class="link-p" href="./index.php">Cancelar</a></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>