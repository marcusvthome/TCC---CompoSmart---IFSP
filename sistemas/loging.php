<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('./conexao.php');

if (empty($_POST['Email']) || empty($_POST['Senha'])) { //verifica se o usuário digitou Email e Senha no formulário
	header('Location: ./');
	exit();
}

$Email = $connect->real_escape_string($_POST['Email']);
$Senha = $connect->real_escape_string($_POST['Senha']);

$sql = mysqli_query($connect, "SELECT * FROM tbusuario WHERE Email = '{$Email}' AND Senha = md5('{$Senha}')");
$row = mysqli_num_rows($sql);
$dado = mysqli_fetch_array($sql);

if ($row > 0 && $dado['Status'] === 'Ativo') {
	$_SESSION['Email'] = $_POST['Email'];
	$_SESSION['Senha'] = $_POST['Senha'];
	$_SESSION['id'] = $_POST['id'];
	$_SESSION['Funcao'] = $dado['Funcao'];
} else {
	$_SESSION['nao_autenticado'] = true;
}

header('Location: ./');
exit();
