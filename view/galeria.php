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
                    <div class="card hoverable card-serie">
                        <div class="card-image">
                            <img src="<?= $jogo->CAPA ?>" class="activator" />
                            <button class="btn-fav btn-floating halfway-fab waves-effect waves-light white" data-id="<?= $jogo->ID ?>">
                                <i class="material-icons red-text"><?= ($jogo->FAVORITO) ? "favorite" : "add" ?></i>
                            </button>
                        </div>
                        <div class="card-content texto">
                            <span class="card-title activator truncate">
                                <?= $jogo->TITULO ?>
                            </span>
                            <hr>
                            <p class="valign-wrapper n">
                                <i class="material-icons amber-text">star</i> <?= "Nota: $jogo->NOTA" ?>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $jogo->TITULO ?><i class="material-icons right">close</i></span>
                            <hr>
                            <p><?= substr($jogo->DESCRICAO, 0, 100) . "..." ?></p>
                            <button class="waves-effect waves-light btn-small right red accent-2 btn-delete"data-id="<?= $jogo->ID ?>"><i class="material-icons">delete</i></button>
                        </div>
                    </div>
                </div>
            
            <?php endforeach ?>
        </div>
    </div>
</body>

<?= Mensagem::mostrar() ?>

<script>
    // Tratamento - Favoritar
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

    // Tratamento - Deletar
    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", e => {
            const id = btn.getAttribute("data-id");
            const requestConfig = { method: "DELETE", header: new Headers()};
            fetch(`/jogos/${id}`, requestConfig)
                .then(response => response.json())
                .then(response => {
                    if (response.success === "ok") {
                        const card = btn.closest(".col");
                        card.classList.add("fadeOut");
                        setTimeout(() => card.remove(), 1000);                        
                    }
                })
                .catch(error => {
                    M.toast({
                        html: 'Erro ao deletar!'
                    });
                })
        });
    });
</script>

</html>