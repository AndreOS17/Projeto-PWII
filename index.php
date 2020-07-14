<?php

$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

require "./controller/jogosController.php"; 

if($rota === "/"){
    require "view/galeria.php";
    exit();
}

if($rota === "/novoJogo"){
    if($metodo == "GET") require "view/cadastrar.php";
    if($metodo == "POST") {
        $controller = new jogosController();
        $controller->save($_REQUEST);
    }
    exit();
}

if(substr($rota, 0, strlen("/favoritar")) === "/favoritar"){
    $controller = new jogosController();
    $controller->favorite(basename($rota));
    exit();
}

require "view/404.php";



