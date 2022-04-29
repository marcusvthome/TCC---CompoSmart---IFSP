<?php
$funcao = $_SESSION['Funcao'];

$administrador = FALSE;
$comum = FALSE;

if ($funcao == 'Administrador') {
    $administrador = TRUE;
} else if ($funcao == 'Comum') {
    $comum = TRUE;
}
