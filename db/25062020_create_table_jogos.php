<?php
$bd = new SQLite3("jogos.db");

$sql = "DROP TABLE IF EXISTS jogos";

if($bd->exec($sql)) echo "\nTabela de Jogos apagada! \n";

$sql = "CREATE TABLE jogos (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
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
        'Grab your friends, hone your blades, and set off for adventure in Trove, the ultimate action MMO! Battle the forces of Shadow in realms filled with incredible dungeons and items created by your fellow players. Whether hunting treasure in far-off lands or building realms of your own, it’s never been this good to be square!',
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
        'Descend into the depths of an alien underwater world filled with wonder and peril. Craft equipment, pilot submarines and out-smart wildlife to explore lush coral reefs, volcanoes, cave systems, and more - all while trying to survive.',
        9.4
)";

if($bd->exec($sql)){
    echo "\nJogos Inseridos com sucesso! \n";
}
else{
    echo "\nERRO: Jogos não foram inseridos \n";
}


?>