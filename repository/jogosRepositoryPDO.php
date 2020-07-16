<?php 

require "Conexao.php";

class jogosRepositoryPDO{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::criar();
    }

    public function listarTodos(){
        $listaJogos = array();
        $sql = "SELECT * FROM jogos";
        $jogos = $this->conexao->query($sql);
        if(!$jogos) return false;

        while($jogo = $jogos->fetchObject()){
            array_push($listaJogos, $jogo);
        }

        return $listaJogos;
    }

    public function salvar($jogo):bool{
        $sql = "INSERT INTO jogos (TITULO, CAPA, DESCRICAO, NOTA) 
                VALUES(:titulo, :capa, :descricao, :nota)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $jogo->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':capa', $jogo->capa, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $jogo->descricao, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $jogo->nota, PDO::PARAM_STR);

        return $stmt->execute();

    }

    public function favoritar(int $id){
        $sql = "UPDATE jogos SET FAVORITO = NOT FAVORITO WHERE ID=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "ERRO";
        }
    }

    public function deletar(int $id){
        $sql = "DELETE FROM jogos WHERE ID=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "ERRO";
        }
    }
}