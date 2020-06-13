<?php include "head.php" ?>

<?php

$bd = new SQLite3("jogos.db");

$sql = "SELECT * FROM jogos";
$jogos = $bd->query($sql);

$jogo1 = 
[
"titulo"=>"Trove",
"nota"=>"9.1",
"descricao"=>"I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
"capa"=>"https://steamcdn-a.akamaihd.net/steam/apps/304050/header.jpg?t=1588710986"
]; 

$jogo2 = 
[
"titulo"=>"Dead Cells",
"nota"=>"9.9",
"descricao"=>"I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
"capa"=>"https://steamcdn-a.akamaihd.net/steam/apps/588650/header.jpg?t=1590998481"
];

$jogo3 = 
[
"titulo"=>"Subnautica",
"nota"=>"9.4",
"descricao"=>"I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
"capa"=>"https://steamcdn-a.akamaihd.net/steam/apps/264710/header.jpg?t=1589483895"
];

$jogo4 = 
[
"titulo"=>"Half-Life: Alyx",
"nota"=>"9.5",
"descricao"=>"I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.",
"capa"=>"https://steamcdn-a.akamaihd.net/steam/apps/546560/header.jpg?t=1590678263"
];

//$jogos = [$jogo1, $jogo2, $jogo3, $jogo4];
?>

    <body>
        <!-- Links:  -->
        <nav class="nav-extended brown darken-3">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right">
                    <li><a href="galeria.php" class="active">Galeria de Jogos</a></li>
                    <li><a href="cadastrar.php">Cadastrar</a></li>
                </ul>
            </div>
            <!-- Logo:  -->
            <div class="nav-header center">
                <h1 class="tituloSite">CLOROGAMES</h1>
            </div>
            <!-- Navtabs:  -->
            <div class="nav-content">
                <ul class="tabs tabs-transparent grey darken-4">
                    <li class="tab active disabled grey darken-4"><a href="#">Todos</a></li>
                    <li class="tab grey darken-4"><a href="#test2">Jogados</a></li>
                    <li class="tab grey darken-4"><a href="#test3">Favoritos</a></li>
                </ul>
            </div>
        </nav>

        <!-- Cards - Geral:  -->
        
        <div class="row">
            <?php while($jogo = $jogos->fetchArray()) : ?>
                <div class="col s3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?= $jogo["CAPA"]?>">
                            <a class="btn-floating btn-large halfway-fab transparent"><i class="material-icons red-text">favorite</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?= $jogo["TITULO"] ?></span>
                            <p class="valign-wrapper">
                                <i class="material-icons amber-text">star</i> 
                                <?= $jogo["NOTA"] ?>
                            </p>
                            <p><?= $jogo["DESCRICAO"] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>

    </body>

</html>