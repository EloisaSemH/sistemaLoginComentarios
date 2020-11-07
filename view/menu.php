<!--Menu principal-->
<nav data-aos="zoom-in" class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm text-center" id="menu-principal">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mx-auto d-lg-none d-xl-none" href="index.php?pg=inicio"><img src="img/logotipo-Horizontal-Cinza.png" alt="logo" width="80" height="auto"></a>
        <a class="navbar-brand mx-auto d-none d-lg-block d-xl-block" href="index.php?pg=inicio"><img src="img/logotipo-Horizontal-Cinza.png" alt="logo" width="150" height="auto"></a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php if (!is_null(@$_SESSION['usuario'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo @$_SESSION['usuario']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-light" href="index.php?&pg=editarusuario">Editar informações</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-light" href="index.php?&pg=enderecos">Endereços</a>
                            <a class="dropdown-item text-light" href="index.php?&pg=cadastroendereco">Cadastrar Endereço</a>
                            <?php if ($_SESSION['logado'] != 1) { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-light" href="index.php?&pg=pedidos&pagina=1">Todos os pedidos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-light" href="index.php?&pg=produtos&pagina=1">Produtos</a>
                                <a class="dropdown-item text-light" href="index.php?&pg=cadastroproduto">Cadastrar produto</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-light" href="index.php?&pg=categorias">Categorias</a>
                                <a class="dropdown-item text-light" href="index.php?&pg=cadastrocategoria">Cadastrar categoria</a>
                                <?php if ($_SESSION['logado'] == 3) { ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-light" href="index.php?&pg=usuarios">Usuarios</a>
                                    <a class="dropdown-item text-light" href="index.php?&pg=editarusuarioporemail">Alterar Usuario por
                                        email</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-light" href="index.php?&pg=editarinfossite">Alterar informações do site</a>
                            <?php }
                            } ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-light" href="index.php?&pg=logout">Sair</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pg=login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pg=cadastro">Cadastro</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($_GET['pg']) && $_GET['pg'] == 'logout') {
    ?>
        <script type="text/javascript">
            alert("Até breve!");
            document.location.href = "index.php";
        </script>
    <?php
        $_SESSION['logado'] = null;
        $_SESSION['usuario'] = null;
        $_SESSION['us_cod'] = null;
    }


    ?>