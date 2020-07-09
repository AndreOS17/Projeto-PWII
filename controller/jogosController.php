<?php

session_start();

require "./repository/jogosRepositoryPDO.php";
require "./model/Jogo.php";

class jogosController{
    public function index(){
        $jogosRepository = new jogosRepositoryPDO();
        return $jogosRepository->listarTodos();
    }

    public function save($request){
        $jogosRepository = new jogosRepositoryPDO();
        $jogo = new Jogo();

        $jogo->titulo     = $request["titulo"];
        $jogo->nota       = $request["nota"];
        $jogo->descricao  = $request["descricao"];
        $jogo->capa       = $request["capa"];

        if($jogosRepository->salvar($jogo)){
            $_SESSION["msg"] = "Jogo cadastrado com sucesso";
        }
        else{
            $_SESSION["msg"] = "Erro ao cadastrar o jogo";
        }

        header("Location: /");

    }
}


?>