<?php include "head.php" ?>

<body>
    <!-- Links:  -->
    <nav class="nav-extended brown darken-3">
        <div class="nav-wrapper n">
            <ul id="nav-mobile" class="right">
                <li><a href="/">Galeria de Jogos</a></li>
                <li><a href="/novoJogo" class="active">Cadastrar</a></li>
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
        <form method="POST">
            <div class="col s6 offset-s3">
                <div class="card grey darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Cadastrar Jogo</span>

                        <!-- Título - Jogo -->
                        <div class="row">
                            <div class="input-field inline col s12">
                                <input type="text" class="validate white-text" name="titulo" required>
                                <label for="titulo">Título do Jogo</label>
                            </div>
                        </div>

                        <!-- Nota - Jogo -->
                        <div class="row">
                            <div class="input-field inline col s3">
                                <input type="number" step=".1" min="0" max="10" class="validate white-text" name="nota" required>
                                <label for="nota">Nota do Jogo</label>
                            </div>
                        </div>

                        <!-- Descrição - Jogo -->
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea class="materialize-textarea white-text" name="descricao" required></textarea>
                                        <label for="descricao">Descrição do Jogo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Imagem - Jogo -->
                        <div>
                            <div class="file-field input-field">
                                <div class="btn brown darken-3 white-text">
                                    <span>Capa do Jogo</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate white-text" type="text" name="capa" required>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-action brown darken-3">
                        <a href="/" class="btn grey darken-4 white-text n">Cancelar</a>
                        <button type="submit" class="btn black white-text n">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>