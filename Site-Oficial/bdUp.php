<?php
$bd = new SQLite3("jogos.db");

$sql = "DROP TABLE IF EXISTS jogos";

if($bd->exec($sql)) echo "\nTabela de Jogos apagada! \n";

$sql = "CREATE TABLE Jogos (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    TITULO VARCHAR(200) NOT NULL,
    NOTA DECIMAL(2,1),
    DESCRICAO TEXT,
    CAPA VARCHAR(200)
)";

if($bd->exec($sql)){
    echo "\nTabela de Jogos criada! \n";
}
else{
    echo "\nERRO: Tabela de Jogos não foi criada \n";
}

$sql = "INSERT INTO jogos (TITULO, CAPA, DESCRICAO, NOTA) VALUES(
        'Trove',
        'https://steamcdn-a.akamaihd.net/steam/apps/304050/header.jpg?t=1588710986',
        'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
        9.1
)";

if($bd->exec($sql)){
    echo "\nJogos Inseridos com sucesso! \n";
}
else{
    echo "\nERRO: Jogos não foram inseridos \n";
}

$sql = "INSERT INTO jogos (TITULO, CAPA, DESCRICAO, NOTA) VALUES(
        'Subnautica',
        'https://steamcdn-a.akamaihd.net/steam/apps/264710/header.jpg?t=1589483895',
        'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.',
        9.4
)";

if($bd->exec($sql)){
    echo "\nJogos Inseridos com sucesso! \n";
}
else{
    echo "\nERRO: Jogos não foram inseridos \n";
}


?>