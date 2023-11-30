<?php

session_start();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}


require_once "config.php";


$username = $password = "";
$username_err = $password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese su usuario.";
    } else {
        $username = trim($_POST["username"]);
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }


    if (empty($username_err) && empty($password_err)) {

        $sql = "SELECT id, correo, password FROM usuarios WHERE correo = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = $username;


            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);


                if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {

                            session_start();


                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;


                            header("location: index.php");
                        } else {

                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else {

                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else {
                echo "Algo salió mal, por favor vuelve a intentarlo.";
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
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        .btn {
            background-color: #04D66A;
            color: white;
        }

        .btn1:hover {
            background-color: #133357;
            color: white;
        }

        .err {
            color: #04D66A;
        }

        .txt {
            color: #133357;
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
        <a class="navbar-brand" href="./login.php" style="color:#04D66A;">IA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./acerca_de.php" style="color:#04D66A;">Acerca de</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./Ayuda.php" style="color:#04D66A;">Ayuda</a>
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

                <h2 class="text-center txt">Iniciar sesión</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label class="txt">Usuario:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block err"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label class="txt">Contraseña:</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block err"><?php echo $password_err; ?></span>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn1" value="Ingresar">
                    </div>
                </form>
                <p class="text-center mt-3 txt">¿No tienes una cuenta? <br> <a class="link-p" href="Registrarse.php">Regístrate aquí</a></p>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>