<?php

require_once "config.php";


$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un usuario.";
    } else {

        $sql = "SELECT id FROM usuarios WHERE correo = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = trim($_POST["username"]);


            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya fue tomado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Al parecer algo salió mal.";
            }
        }


        mysqli_stmt_close($stmt);
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingresa una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }


    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma tu contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "No coincide la contraseña.";
        }
    }


    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {


        $sql = "INSERT INTO usuarios (correo, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);


            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            if (mysqli_stmt_execute($stmt)) {

                header("location: login.php");
            } else {
                echo "Algo salió mal, por favor inténtalo de nuevo.";
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
        <a class="navbar-brand" href="./Registrarse.php" style="color:#04D66A;">IA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./acerca_de.php" style="color:#04D66A;">Acerca de</a>
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

                <h2 class="text-center">Registrarse</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label for="name">Usuario:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block err"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label for="email">Contraseña:</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                        <span class="help-block err"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label for="password">Confirmar contraseña:</label>
                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        <span class="help-block err"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn1" value="Ingresar">
                    </div>
                </form>
                <p class="text-center mt-3"><a class="link-p" href="login.php">Inicio Sesión</a></p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>