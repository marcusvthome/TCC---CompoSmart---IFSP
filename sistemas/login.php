<?php
session_start();

if (isset($_SESSION['Email'])) {
    header('Location: ./');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt" style="height: 100%!important;">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="icon" href="./img/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <!-- Custom styles for this template-->

</head>

<body style="height: 100%!important; background-image: url('https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2021/02/03/3b1dae3c6bfcd02ae88dd9bfa8fc70b2.gif'); background-size:cover;">

    <div class="container d-flex flex-column justify-content-center" style="height: 100%!important;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="py-5 px-4 p-md-5">
                                    <div class="text-center">
                                        <img src="./img/logo2.png" alt="Logo" width="50%">
                                        <h1 class="h4 text-gray-700 mb-4">CompoSmart Login</h1>
                                        <!-- <h1 class="h4 text-primary mb-4">Sistemas</h1> -->
                                    </div>

                                    <?php
                                    if (isset($_SESSION['nao_autenticado'])) :
                                    ?>
                                        <div class="alert text-white bg-danger text-center" role="alert">
                                            Erro: Usuário ou Senha inválidos!
                                        </div>
                                    <?php
                                    endif;
                                    unset($_SESSION['nao_autenticado']);
                                    ?>

                                    <form class="user" action="./loging.php" method="POST">
                                        <div class="form-group">
                                            <input name="Email" type="email" class="form-control form-control-user" id="txtEmail" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="form-group position-relative">
                                            <input name="Senha" type="password" class="form-control form-control-user" id="txtSenha" placeholder="Senha">
                                            <div class="btnTogglePassword position-absolute" style="top: 1.2px; right: 2px; padding: 15.6px;"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block" style="color: white ; background-image: url('./img/gradiente3.png') ;">
                                            Entrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/script.js"></script>

</body>

</html>