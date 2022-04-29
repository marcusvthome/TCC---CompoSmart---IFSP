<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

if (!isset($_SESSION['Email'])) {
    header('Location: ./login.php');
    exit();
} else {
    $Email = $_SESSION['Email'];
    $Senha = $_SESSION['Senha'];
    $Funcao = $_SESSION['Funcao'];

    $sql = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '{$Email}' AND Senha = md5('{$Senha}') AND Funcao ='{$Funcao}'");
    $row = mysqli_num_rows($sql);

    if (!$row > 0) {
        header('Location: ./logout.php');
        exit();
    }
}
