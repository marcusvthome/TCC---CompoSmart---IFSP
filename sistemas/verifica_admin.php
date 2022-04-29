<?php
$url = explode("/", "$_SERVER[REQUEST_URI]");

if ($administrador == FALSE) {
    header('Location: /' . $url[1]);
    exit();
}
