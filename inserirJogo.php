<?php
    
    $bd = new SQLite3("jogos.db");

    $titulo     = $bd->escapeString($_POST["titulo"]);
    $nota       = $bd->escapeString($_POST["nota"]);
    $descricao  = $bd->escapeString($_POST["descricao"]);
    $capa       = $bd->escapeString( $_POST["capa"]);


    $sql = "INSERT INTO jogos (TITULO, CAPA, DESCRICAO, NOTA) 
            VALUES(:titulo, :capa, :descricao, :nota)";
    $stmt = $bd->prepare($sql);
    $stmt->bindValue(':titulo', $titulo, SQLITE3_TEXT);
    $stmt->bindValue(':capa', $capa, SQLITE3_TEXT);
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':nota', $nota, SQLITE3_FLOAT);

    if($stmt->execute()){
        echo "\nJogos Inseridos com sucesso! \n";
    }
    else{
        echo "\nERRO: Jogos não foram inseridos! ".$bd->lastErrorMsg();
    }

    header("Location: galeria.php?msg=Jogo+cadastrado+com+sucesso!");

?>