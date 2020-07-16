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
        $jogo = (object) $request;

        $upload = $this->saveCapa($_FILES);

        if(gettype($upload) == "string"){
            $jogo->capa = $upload;
        }

        if($jogosRepository->salvar($jogo)){
            $_SESSION["msg"] = "Jogo cadastrado com sucesso";
        }
        else{
            $_SESSION["msg"] = "Erro ao cadastrar o jogo";
        }

        header("Location: /");

    }

    private function saveCapa($file){
        $capaDir = "imagens/capas/";
        $capaPath = $capaDir . basename($file["capa_file"]["name"]);
        $capaTmp = $file["capa_file"]["tmp_name"];
        if(move_uploaded_file($capaTmp, $capaPath)){
            return $capaPath;
        }
        else{
            return false;
        }
    }

    public function favorite(int $id){
        $jogosRepository = new jogosRepositoryPDO();
        $result = ['success' => $jogosRepository->favoritar($id)];

        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function delete(int $id){
        $jogosRepository = new jogosRepositoryPDO();
        $result = ['success' => $jogosRepository->deletar($id)];

        header('Content-type: application/json');
        echo json_encode($result);
    }
}


?>