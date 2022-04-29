<?php

session_start();
include('../conexao.php');

$acao = @$_GET['acao'];

if ($acao == "") {

    $NomeLinha = $connect->real_escape_string($_POST['txtNome']);
    $DataCriacao = $connect->real_escape_string($_POST['dtData']);
    $TipoComposto = $connect->real_escape_string($_POST['slctTipoComposto']);
    $Tamanho = $connect->real_escape_string($_POST['slctTamanho']);
    $Local = $connect->real_escape_string($_POST['txtLocal']);
    $Descricao = $connect->real_escape_string($_POST['txtDescricao']);

    $Email = $_SESSION['Email'];

    $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '$Email'");
    $dado = mysqli_fetch_array($qr);
    $CodFuncionario = $dado['id'];

    $sql = "INSERT INTO tblinha (CodFuncionario,  Local, TipoComposto, DataCriacao, Descricao, HoraCadastro, DataCadastro, NomeLinha, Status, Estagio, Tamanho, CodLinhaMesclada) VALUES('$CodFuncionario', '$Local', '$TipoComposto', '$DataCriacao', '$Descricao', CURTIME(), CURDATE(), '$NomeLinha', '1', 'Inicial', '$Tamanho', '0')";

    if ($connect->query($sql) === TRUE) {
        $_SESSION['linha_cadastrada'] = true;
    }

    $connect->close();


    header('Location: ../index.php');
    exit();
} else {

    $id = @$_GET['id'];

    if ($acao == "editarlinha") {

        $Estagio = $connect->real_escape_string($_POST['slctEstagio']);
        $NomeLinha = $connect->real_escape_string($_POST['txtNome']);
        $DataCriacao = $connect->real_escape_string($_POST['dtData']);
        $TipoComposto = $connect->real_escape_string($_POST['slctTipoComposto']);
        $Tamanho = $connect->real_escape_string($_POST['slctTamanho']);
        $Local = $connect->real_escape_string($_POST['txtLocal']);
        $Descricao = $connect->real_escape_string($_POST['txtDescricao']);

        $sql = "UPDATE tblinha SET Descricao = '{$Descricao}', Estagio = '{$Estagio}', NomeLinha  = '{$NomeLinha}', DataCriacao  = '{$DataCriacao}', TipoComposto = '{$TipoComposto}', Tamanho = '{$Tamanho}', Local = '{$Local}', Descricao  = '{$Descricao}'  WHERE Id = '{$id}'";

        if ($connect->query($sql) === TRUE) {
            $_SESSION['linha_alterada'] = true;
        } else {
            $_SESSION['erro_edicao'] = true;
        }

        $connect->close();

        //header('Location: ../index.php?p=linhas&acao=editarlinha&id=' . $id);
        header('Location: ../index.php?p=linhas');
        exit();
    } else if ($acao == "visualizarlinha") {
        header('Location: ../index.php?p=linhas&acao=visualizarlinha&id=' . $id);
        exit();
    } else if ($acao == "nova-sessao") {
        header('Location: ../index.php?p=nova-sessao');
        exit();
    } else if ($acao == "excluirlinha") {

        $sql = "UPDATE tblinha SET Status = '0' WHERE Id = '{$id}'";

        if ($connect->query($sql) === TRUE) {
            $_SESSION['linha_excluida'] = true;
        } else {
            $_SESSION['erro_exclusao'] = true;
        }

        $connect->close();

        header('Location: ../index.php?p=linhas');
        exit();
    } else if ($acao == "mesclarlinha") {

        $NomeLinha = $connect->real_escape_string($_POST['txtNome']);
        $DataCriacao = $connect->real_escape_string($_POST['dtData']);
        $TipoComposto = $connect->real_escape_string($_POST['slctTipoComposto']);
        $Tamanho = $connect->real_escape_string($_POST['slctTamanho']);
        $Local = $connect->real_escape_string($_POST['txtLocal']);
        $Descricao = $connect->real_escape_string($_POST['txtDescricao']);
        $CodLinhaMesclada = $id;

        $Email = $_SESSION['Email'];
        $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '$Email'");
        $dado = mysqli_fetch_array($qr);
        $CodFuncionario = $dado['id'];

        $sql = "INSERT INTO tblinha (CodFuncionario,  Local, TipoComposto, DataCriacao, Descricao, HoraCadastro, DataCadastro, NomeLinha, Status, Estagio, Tamanho, CodLinhaMesclada) VALUES('$CodFuncionario', '$Local', '$TipoComposto', '$DataCriacao', '$Descricao', CURTIME(), CURDATE(), '$NomeLinha', '1', 'Inicial', '$Tamanho', $CodLinhaMesclada)";

        if ($connect->query($sql) === TRUE) {
            $_SESSION['status_cadastro'] = true;
        }

        $connect->close();

        header('Location: ../index.php');
        exit();
    } else if ($acao == "finalizarlinha") {

        $sql = "UPDATE tblinha SET Estagio = 'Curado', Status = '0' WHERE Id = '{$id}'";

        if ($connect->query($sql) === TRUE) {
            $_SESSION['linha_finalizada'] = true;
        } else {
            $_SESSION['erro_exclusao'] = true;
        }

        $connect->close();

        header('Location: ../index.php?p=linhas');
        exit();
    }
}
