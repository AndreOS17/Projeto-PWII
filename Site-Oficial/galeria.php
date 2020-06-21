<?php include "head.php" ?>

<?php

$bd = new SQLite3("jogos.db");

$sql = "SELECT * FROM jogos";
$jogos = $bd->query($sql);

?>

    <body>
        <!-- Links:  -->
        <nav class="nav-extended brown darken-3">
            <div class="nav-wrapper n">
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
                <ul class="tabs tabs-transparent grey darken-4 n">
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
                            <div class="card-content texto">
                                <span class="card-title"><?= $jogo["TITULO"] ?></span>
                                <p class="valign-wrapper n">
                                    <i class="material-icons amber-text">star</i> 
                                    <?= "Nota: ",$jogo["NOTA"] ?>
                                </p>
                                <hr>
                                <p><?= $jogo["DESCRICAO"] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
    </body>
    <?php if(isset($_GET["msg"])): ?>
        <script>
            M.toast({
                html: '<?= $_GET["msg"] ?>'
            })
        </script>
    <?php endif ?>
</html>