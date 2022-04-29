<?php

session_start();
include('../conexao.php');

$CodLinha = @$_GET['id'];
$acao = @$_GET['acao'];
$id = @$_GET['id'];
if ($acao == "cadastrarsecao") {
    
    $PosicaoLinha = $connect->real_escape_string($_POST['txtPosicao']);
    $DataCriacao = $connect->real_escape_string($_POST['dtData']);
    $NomeFuncionario = $connect->real_escape_string($_POST['txtNomeFuncionario']);
    $Observacao = $connect->real_escape_string($_POST['txtObservacao']);

    $Email = $_SESSION['Email'];

    $qr = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '$Email'");
    $dado = mysqli_fetch_array($qr);

    $CodFuncionarioCadastro = $dado['id'];

    $qrTamanho = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '$CodLinha'");
    $dadoTamanho = mysqli_fetch_array($qrTamanho);
    

    $sql = "INSERT INTO tbsecao(CodLinha, PosicaoLinha, DataCriacao, DataCadastro, HoraCadastro, NomeFuncionario, CodFuncionarioCadastro, Observacao) VALUES('$CodLinha','$PosicaoLinha','$DataCriacao', CURDATE(), CURTIME(), '$NomeFuncionario', '$CodFuncionarioCadastro', '$Observacao')";
    if ($connect->query($sql) === TRUE) {
        $CodSecao = 0;
        $CodSecao = $connect->insert_id;
        $_SESSION['status_cadastro'] = true;
        if ($dadoTamanho['Tamanho'] == '3m x 1,5m') {
            $Horizontal = 1;
            $Vertical = 0;
            for ($i = 1; $i < 7; $i++) {
                $NumTAux = "numT$i";
                $NumUAux = "numU$i";
                $NumT = $connect->real_escape_string($_POST[$NumTAux]);
                $NumU = $connect->real_escape_string($_POST[$NumUAux]);
                if ($i == 2) {
                    $Horizontal =  0.5;
                    $Vertical = 0.5;
                } else if ($i == 3) {
                    $Horizontal = 0;
                    $Vertical = 0.5;
                } else if ($i == 4) {
                    $Vertical = 1;
                    $Horizontal = 0.5;
                } else if ($i == 5) {
                    $Vertical = 1;
                    $Horizontal = 0;
                } else if ($i == 6) {
                    $Vertical = 1.5;
                    $Horizontal = 0;
                } else {
                    $Horizontal = 1;
                    $Vertical = 0.5;
                }
                $sqlCoordenada = "INSERT INTO tbcoordenada(CodSecao, Horizontal, Vertical, Temperatura, Umidade) VALUES('$CodSecao',$Horizontal,$Vertical,$NumT,$NumU)";
                if ($connect->query($sqlCoordenada) === TRUE) {
                    $_SESSION['secao_cadastrada'] = true;
                };
            };
            $connect->close();

            header('Location: ../index.php');
            exit();
        }

        if ($dadoTamanho['Tamanho'] == '2m x 1m') {
            $Horizontal = 0;
            $Vertical = 0;
            for ($j = 1; $j < 4; $j++) {
                $NumTAux = "numT$j";
                $NumUAux = "numU$j";
                $NumT = $connect->real_escape_string($_POST[$NumTAux]);
                $NumU = $connect->real_escape_string($_POST[$NumUAux]);
                if ($i == 2) {
                    $Horizontal =  0;
                    $Vertical = 0.5;
                } else if ($i == 3) {
                    $Horizontal = 0;
                    $Vertical = 1;
                } else {
                    $Horizontal = 1;
                    $Vertical = 0.5;
                }
                $sqlCoordenada = "INSERT INTO tbcoordenada(CodSecao, Horizontal, Vertical, Temperatura, Umidade) VALUES('$CodSecao',$Horizontal,$Vertical,$NumT,$NumU)";
                if ($connect->query($sqlCoordenada) === TRUE) {
                    $_SESSION['secao_cadastrada'] = true;
                };
            };
            $connect->close();

            header('Location: ../index.php');
            exit();
        }
    }
} else if ($acao == "excluirsecao") {

    $sql3 = mysqli_query($connect, "SELECT * FROM tbsecao WHERE Id = '{$id}'");
    $dado = mysqli_fetch_array($sql3);
    $idLinha = $dado['CodLinha'];
    $sql = "DELETE FROM tbsecao WHERE id = '{$id}'";
    $sql2 = "DELETE FROM tbcoordenada WHERE CodSecao = '{$id}'";
    //echo $sql;

    if ($connect->query($sql) === TRUE) {
        $_SESSION['secao_excluida'] = true;
    } else {
        $_SESSION['erro_exclusao'] = true;
    }

    if ($connect->query($sql2) === TRUE) {
        $_SESSION['coordenadas_excluidas'] = true;
    } else {
        $_SESSION['erro_exclusao'] = true;
    }

    $qrTamanho = mysqli_query($connect, "SELECT * FROM tblinha WHERE Id = '$CodLinha'");
    $dadoTamanho = mysqli_fetch_array($qrTamanho);

    $connect->close();

    header('Location: ../index.php?p=linhas&acao=editarlinha&id=' . $idLinha);
    exit();
}
