<?php

session_start();

require "./repository/jogosRepositoryPDO.php";

$jogosRepository = new jogosRepositoryPDO();
$jogo = new Jogo();

$jogo->titulo     = $_POST["titulo"];
$jogo->nota       = $_POST["nota"];
$jogo->descricao  = $_POST["descricao"];
$jogo->capa       = $_POST["capa"];

if($jogosRepository->salvar($jogo)){
    $_SESSION["msg"] = "Jogo cadastrado com sucesso";
}
else{
    $_SESSION["msg"] = "Erro ao cadastrar o jogo";
}

header("Location: /");

?>