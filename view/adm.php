<?php
if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
    ?>
    <script type="text/javascript">
        alert("Desculpe, você não tem permissão para acessar o painel de administração");
        document.location.href = "index.php";
    </script>
    <?php
}

require_once ("db/classes/DAO/usuarioDAO.class.php");
$usuarioDAO = new usuarioDAO();

$dados = $usuarioDAO->pegarInfos($_SESSION['cod_usuario']);

if($dados['us_sexo'] == 'f'){
    $sexo = 'a à';
}else{
    $sexo = 'o a';    
}
?>
<div class="container mt-4">
    <div class="card">
        <div class="card-body text-justify">
            <a href="index.php?&pg=logout" title="Sair"><h3 style="font-size: 25px;" class="float-right text-dark font-weight-bold">x</h3></a>
            <h6><a class="text-uppercase font-weight-bold text-dark" href="?&pg=usuariopg" title="Ir para a página de edição do usuário"><?= $dados['us_nome']; ?></a></h6>
            <?php if ($_SESSION['logado'] === 3){ ?>
            <p>Bem vind<?= $sexo; ?> página de administração, Webmaster.</p>
            <?php }else{ ?>
            <p>Bem vind<?= $sexo; ?> página de postagem.</p>
            <?php } ?>
        </div>
    </div>
    <div class="card">
        <div class="container text-center text-md-left mt-2">
            <div class="row mt-3 text-secondary">
                <!-- Noticias -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
                    <h6 class="text-uppercase font-weight-bold text-dark">Notícias</h6>
                    <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a class="text-secondary" href="index.php?&pg=publicarnoticia">Publicar notícia</a></p>
                    <?php if ($_SESSION['logado'] === 3){ ?>
                        <p><a class="text-secondary" href="index.php?&pg=noticiaspendentes">Notícias pendentes</a></p>
                    <?php } ?>
                </div>
                <!-- Galeria -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
                    <h6 class="text-uppercase font-weight-bold text-dark">Galeria</h6>
                    <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><a class="text-secondary" href="index.php?&pg=publicarfoto">Publicar foto</a></p>
                </div>
                <!-- Usuários -->
                <?php if ($_SESSION['logado'] === 3){ ?>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
                        <h6 class="text-uppercase font-weight-bold text-dark">Usuários</h6>
                        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p><a class="text-secondary" href="index.php?&pg=todosusuarios">Todos os usuários</a></p>
                        <p><a class="text-secondary" href="index.php?&pg=editarusuario">Editar usuário</a></p>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
