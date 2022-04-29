<?php
ob_start();
include('./conexao.php');
include('./verifica_login.php');
include('./funcoes.php');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br" style="height: 100%!important;">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CompoSmart - Compostagem Inteligente</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="icon" href="./img/favicon.png">



    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">



    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" style="height: 100%!important;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-image: url('./img/gradiente4.png') ;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/sistemas">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <img src="./img/logo3.png" width="70x" alt="Logotipo">
                <!-- <div class="sidebar-brand-text mx-1">CompoSmart</div>-->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item dashboard">
                <a class="nav-link" href="/sistemas">
                    <i class="fas fa-book"></i>
                    <span>Gerenciamento</span>

                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Linha
            </div>

            <!-- Nav Item - Usuários Collapse Menu -->
            <li class="nav-item cadastro">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesC" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-recycle "></i>
                    <span>Linhas</span>
                </a>
                <div id="collapsePagesC" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item linha" href="./index.php?p=nova-linha">Cadastrar</a>
                        <!--<a class="collapse-item linhas" href="./index.php?p=linhas">Todas</a>-->
                        <a class="collapse-item linhas" href="./index.php?p=historico">Histórico</a>
                    </div>
                </div>
            </li>

            <!-- ------------------------------------------------------------------------ -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Usuário
            </div>

            <?php
            if ($administrador) {
            ?>
                <li class="nav-item usuarios">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-users"></i>
                        <span>Usuários</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item usuarios" href="./index.php?p=usuarios">Todos</a>
                            <a class="collapse-item usuario" href="./index.php?p=usuario">Cadastrar</a>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>

            <!-- Nav Meu Perfil - Tables -->
            <li class="nav-item perfil">
                <a class="nav-link" href="./index.php?p=perfil">
                    <i class="fas fa-user-circle"></i>
                    <span>Meu Perfil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/favicon.png" alt="">
                <p class="text-center mb-2">Te ajudando a <strong>cultivar</strong> sonhos! </p>
                <h3>☺</h3>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Daniel Filho</span> -->
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo $_SESSION['Email'];
                                    $Email = $_SESSION['Email'];

                                    $sql = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '{$Email}'");
                                    $dadoImagem = mysqli_fetch_array($sql);

                                    $Imagem = $dadoImagem['img'];
                                    ?>
                                </span>
                                <?php
                                if ($Imagem != NULL) {
                                    echo "<img class='img-profile rounded-circle' src='./img/usuarios/" . $Imagem . "'>";
                                } else {
                                    echo "<img class='img-profile rounded-circle' src='./img/undraw_profile.svg' >";
                                }
                                ?>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./index.php?p=perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <?php
                        include("./alertas.php");
                    $valor = @$_GET['p'];

                    if ($valor == '') {
                        include './linhas/linhas.php';
                    } else if ($valor == 'usuarios') {
                        include './usuarios/usuarios.php';
                    } else if ($valor == 'usuario') {
                        include './usuarios/usuario.php';
                    } else if ($valor == 'nova-linha') {
                        include './linhas/novalinha.php';
                    } else if ($valor == 'nova-secao') {
                        include './secoes/novasecao.php';
                    } else if ($valor == 'linhas') {
                        include './linhas/linhas.php';
                    } else if ($valor == 'historico') {
                        include './linhas/historico.php';
                    } else if ($valor == 'linhascuradas') {
                        include './linhas/linhascuradas.php';
                    } else if ($valor == 'secoes') {
                        include './secoes/secoes.php';
                    } else if ($valor == 'perfil') {
                        include './perfil.php';
                    } else {
                        include './404.php';
                    }

                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-4">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Daires & Thomé <script>
                                document.write(new Date().getFullYear());
                            </script></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded-circle" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%!important;">

        <div class="d-flex justify-content-center align-items-center modal-dialog my-0" role="document" style="height: 100%;">
            <div class="modal-content" style="height: fit-content;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clique em "Sair" abaixo se você deseja encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn " style="background-image: url('./img/gradiente4.png'); color:white;" href="./logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/script.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</body>

</html>