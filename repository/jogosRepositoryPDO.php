<?php 

require "Conexao.php";

class jogosRepositoryPDO{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::criar();
    }

    public function listarTodos():Array{
        $listaJogos = array();
        $sql = "SELECT * FROM jogos";
        $jogos = $this->conexao->query($sql);

        while($jogo = $jogos->fetchObject()){
            array_push($listaJogos, $jogo);
        }

        return $listaJogos;
    }

    public function salvar(Jogo $jogo):Bool{
        $sql = "INSERT INTO jogos (TITULO, CAPA, DESCRICAO, NOTA) 
                VALUES(:titulo, :capa, :descricao, :nota)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $jogo->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':capa', $jogo->capa, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $jogo->descricao, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $jogo->nota, PDO::PARAM_STR);

        return $stmt->execute();

    }
}