<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('../conexao.php');
include('../verifica_login.php');
include('../funcoes.php');

$acao = @$_GET['acao'];
$perfil = @$_GET['perfil'];

if ($perfil == "") {
    include('../verifica_admin.php');
}

if ($acao == "") {

    $Nome = mysqli_real_escape_string($connect, trim($_POST['Nome']));
    $dataNasc = mysqli_real_escape_string($connect, trim($_POST['DataNasc']));
    $Telefone = mysqli_real_escape_string($connect, trim($_POST['Telefone']));
    $Funcao = mysqli_real_escape_string($connect, trim($_POST['Funcao']));
    $Email = mysqli_real_escape_string($connect, trim($_POST['Email']));
    $Senha = mysqli_real_escape_string($connect, trim(md5($_POST['Senha'])));

    $sql = "SELECT COUNT(*) AS total FROM tbusuario WHERE Email = '{$Email}'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['total'] > 0) {
        $_SESSION['usuario_existente'] = true;
        header('Location: ../index.php?p=usuario');
        exit();
    }

    $img = NULL;
    if ($_FILES['img']['size'] > 0) {
        $extensao = explode(".", strtolower($_FILES['img']['name']));
        $extensao = "." . $extensao[count($extensao) - 1];
        $img = md5(time()) . $extensao;
        $diretorio = "../img/usuarios/";

        move_uploaded_file($_FILES['img']['tmp_name'], $diretorio . $img);
    }

    $sql = "INSERT INTO tbusuario (Nome, DataNasc, Telefone, Funcao, Email, Senha, Status, img) VALUES ('{$Nome}', '{$dataNasc}', '{$Telefone}', '{$Funcao}', '{$Email}', '{$Senha}', 'Ativo', '{$img}')";

    if ($connect->query($sql) === TRUE) {
        $_SESSION['usuario_cadastrado'] = true;
    } else {
        $_SESSION['erro_cadastro'] = true;
    }

    $connect->close();

    header('Location: ../index.php?p=usuarios');
    exit();
} else {

    $id = @$_GET['id'];

    if ($acao == "editar") {

        $Nome = mysqli_real_escape_string($connect, trim($_POST['Nome']));
        $dataNasc = mysqli_real_escape_string($connect, trim($_POST['DataNasc']));
        $Telefone = mysqli_real_escape_string($connect, trim($_POST['Telefone']));
        $Funcao = mysqli_real_escape_string($connect, trim($_POST['Funcao']));
        $Email = mysqli_real_escape_string($connect, trim($_POST['Email']));
        $Senha = mysqli_real_escape_string($connect, trim(md5($_POST['Senha'])));

        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE id = '{$id}'");
        $dado = mysqli_fetch_array($qr);

        $img = $dado['img'];
        if ($_FILES['img']['size'] > 0) {
            if ($dado['img'] != NULL) {
                if (is_file("../img/usuarios/" . $img)) {
                    unlink("../img/usuarios/" . $img);
                }
            }

            $extensao = explode(".", strtolower($_FILES['img']['name']));
            $extensao = "." . $extensao[count($extensao) - 1];
            $img = md5(time()) . $extensao;

            $diretorio = "../img/usuarios/";

            move_uploaded_file($_FILES['img']['tmp_name'], $diretorio . $img);
        }

        if ($Senha != mysqli_real_escape_string($connect, trim(md5("")))) {
            $sql = "UPDATE tbusuario SET Nome = '{$Nome}', Senha= '{$Senha}', DataNasc = '{$dataNasc}', Telefone = '{$Telefone}', Funcao = '{$Funcao}', Email = '{$Email}', img = '{$img}' WHERE id = '{$id}'";
        } else {
            $sql = "UPDATE tbusuario SET Nome = '{$Nome}', DataNasc = '{$dataNasc}', Telefone = '{$Telefone}', Funcao = '{$Funcao}', Email = '{$Email}', img = '{$img}' WHERE id = '{$id}'";
        }

        if ($connect->query($sql) === TRUE) {

            $connect->close();

            if ($perfil == "true") {
                $_SESSION['perfil_atualizado'] = true;

                header('Location: ../index.php?p=perfil');

                exit();
            } else {
                $_SESSION['usuario_alterado'] = true;
                
                header('Location: ../index.php?p=usuarios&acao=editar&id=' . $id);

                exit();
            }

            
        } else {
            $_SESSION['erro_edicao'] = true;
        }
    } else if ($acao == "excluir") {

        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE id = '{$id}'");
        $dado = mysqli_fetch_array($qr);

        if ($dado['img'] != NULL) {
            if (is_file("../img/usuarios/" . $dado['img'])) {
                unlink("../img/usuarios/" . $dado['img']);
            }
        }

        $sql = "UPDATE tbusuario SET Status = 'Inativo' WHERE id = '{$id}'";
        //echo $sql;

        if ($connect->query($sql) === TRUE) {
            $_SESSION['usuario_excluido'] = true;
        } else {
            $_SESSION['erro_exclusao'] = true;
        }

        $connect->close();

        header('Location: ../index.php?p=usuarios');
        exit();
    }
}
