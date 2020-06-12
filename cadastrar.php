<?php include "head.php" ?>

<body>
    <!-- Links:  -->
    <nav class="nav-extended brown darken-3">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="galeria.php">Galeria de Jogos</a></li>
                <li><a href="cadastrar.php" class="active">Cadastrar</a></li>
            </ul>
        </div>
        <!-- Logo:  -->
        <div class="nav-header center">
            <h1 class="tituloSite">CLOROGAMES</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent grey darken-4">
                
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card grey darken-4">
                <div class="card-content white-text">
                    <span class="card-title">Cadastrar Jogo</span>

                    <!-- Título - Jogo -->
                    <div class="row">
                        <div class="input-field inline col s12">
                            <input id="titulo" type="text" class="validate white-text" required>
                            <label for="titulo">Título do Jogo</label>
                        </div>
                    </div>

                    <!-- Nota - Jogo -->
                    <div class="row">
                        <div class="input-field inline col s3">
                            <input id="nota" type="number" step=".1" min="0" max="10" class="validate white-text" required>
                            <label for="nota">Nota do Jogo</label>
                        </div>
                    </div>

                    <!-- Descrição - Jogo -->
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="descricao" class="materialize-textarea white-text" required></textarea>
                                    <label for="descricao">Descrição do Jogo</label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Imagem - Jogo -->
                    <form action="#">
                        <div class="file-field input-field">
                            <div class="btn brown darken-3 white-text">
                                <span>Capa do Jogo</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input id="imagem" class="file-path validate" type="text">
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="card-action brown darken-3">
                    <a href="galeria.php" class="btn grey darken-4 white-text">Cancelar</a>
                    <a href="#" class="btn black white-text">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>

</body>