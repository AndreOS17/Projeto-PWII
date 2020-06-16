<?php include "head.php" ?>

<body>

<nav class="nav-extended">
    <div class="nav-wrapper grey darken-4">
        <a href="#" class="brand-logo center">CLOROGAMES2</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Galeria</a></li>
            <li><a href="cadastro.php">Cadastrar</a></li>
        </ul>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent"></ul>
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