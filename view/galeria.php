<?php include "head.php" ?>

<?php
session_start();

require "./util/Mensagem.php";

$controller = new jogosController();
$jogos = $controller->index();

?>

<body>
    <!-- Links:  -->
    <nav class="nav-extended brown darken-3">
        <div class="nav-wrapper n">
            <ul id="nav-mobile" class="right">
                <li><a href="/" class="active">Galeria de Jogos</a></li>
                <li><a href="/novoJogo">Cadastrar</a></li>
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
    <div class="container">
        <div class="row">

            <?php if (!$jogos) echo "<p class='card-panel brown darken-3 white-text'>Nenhum jogo cadastrado!</p>" ?>

            <?php foreach ($jogos as $jogo) : ?>
                <div class="col s12 m6 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="<?= $jogo->CAPA ?>">
                            <button class="btn-fav btn-floating btn-large halfway-fab white" data-id="<?= $jogo->ID ?>">
                                <i class="material-icons red-text"><?= ($jogo->FAVORITO) ? "favorite" : "add" ?></i>
                            </button>
                        </div>
                        <div class="card-content texto">
                            <span class="card-title"><?= $jogo->TITULO ?></span>
                            <p class="valign-wrapper n">
                                <i class="material-icons amber-text">star</i>
                                <?= "Nota: ", $jogo->NOTA ?>
                            </p>
                            <hr>
                            <p><?= $jogo->DESCRICAO ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

<?= Mensagem::mostrar() ?>

<script>
    document.querySelectorAll(".btn-fav").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = btn.getAttribute("data-id");
            fetch(`/favoritar/${id}`)
                .then(response => response.json())
                .then(response => {
                    if (response.success === "ok") {
                        if (btn.querySelector("i").innerHTML === "add") {
                            btn.querySelector("i").innerHTML = "favorite";
                        } else {
                            btn.querySelector("i").innerHTML = "add";
                        }
                    }
                })
                .catch(error => {
                    M.toast({
                        html: 'Erro ao favoritar!'
                    });
                })
        });
    });
</script>

</html>