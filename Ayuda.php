<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>

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
                    <a class="nav-link" href="./login.php" style="color:#04D66A;">Log in</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./Registrarse.php" style="color:#04D66A;">Registrarse</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container fondo bordes">
        <div class="row justify-content-center mt-4">
            <div class="col-md-9">

                <h2 class="text-center txt">Ayuda</h2> <br>
                <h4 class="text-center txt">Estos videos podrían ayudarte a comprender más algunos temas</h4>
            </div>
            <div class="card-deck mt-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./IMG/Video1.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Acervo digital introducción a las lenguas indígenas</h5>
                        <p class="card-text">La introducción a las lenguas indígenas sugiere que este acervo digital se centra en la preservación y promoción de las lenguas indígenas.</p>
                        <a href="https://youtu.be/zmRg5PWDkaA" class="btn btn1">Ver</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./IMG/Video2.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Acervo digital continuación a la introducción a las lenguas indígenas.</h5>
                        <p class="card-text">Este acervo pretende promover la prevención de desaparición de la lengua indígena náhuatl. 
Tercer video</p>
                        <a href="https://youtu.be/GUb3nEc7Gm0" class="btn btn1">Ver</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./IMG/Video3.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Acervo digital historia lengua náhuatl </h5>
                        <p class="card-text"> Este tipo de acervos se crean con el propósito de preservar, difundir y compartir información en formato digital sobre la lengua  indígena náhuatl.</p>
                        <a href="https://youtu.be/WpWbtMM6qiI" class="btn btn1">Ver</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>