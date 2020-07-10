<?php
$bd = new SQLite3("./db/jogos.db");

$sql = "ALTER TABLE jogos ADD COLUMN FAVORITO INT DEFAULT 0";

if($bd->exec($sql)){
    echo "\nTabela de Jogos alterada com sucesso! \n";
}
else{
    echo "\nErro ao alterar tabela! \n";
}