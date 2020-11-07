<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?&pg=inicio"><img src="img/Logo.png" width="50px" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active mx-auto">
          <a class="nav-link" href="index.php?&pg=inicio">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mx-auto">
          <a class="nav-link" href="index.php?&pg=galeria">Galeria</a>
      </li>
      <li class="nav-item mx-auto">
          <a class="nav-link" href="index.php?&pg=eventos">Eventos</a>
      </li>
      <li class="nav-item mx-auto">
          <a class="nav-link" href="index.php?&pg=noticias">Noticias</a>
      </li>
      <!-- <li class="nav-item mx-auto">
          <a class="nav-link" href="index.php?&pg=contato">Contato</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control col-md-12 col-lg-7 mr-sm-2" type="search" placeholder="Pesquisar" name="pesquisa">
      <button class="btn btn-outline-success col-md-12 col-lg-4 my-2 my-sm-0 mx-auto" type="submit" name="ir">Pesquisar</button>
      <?php
      if(isset($_POST['ir'])){
        //selectlike
        $pesquisa  = str_replace(" ", "+", $_POST['pesquisa']);
        ?>
        <script type="text/javascript">
          document.location.href = "index.php?&pg=pesquisar&pagina=1&search=<?php echo $pesquisa; ?>";
        </script>
        <?php
      }
      ?>
    </form>
    <?php
      if ($_SESSION['logado'] == 1) {
        // Usuário comum
        ?>
        <form class="form-inline my-1 mx-1 ml-2">
          <a class="btn btn-success my-1 mr-1 col-sm-3 col-md-12 col-lg-9" href="index.php?&pg=usuariopg">Editar informações</a>
          <a class="nav-link text-center my-1 mr-1 col-sm-3 col-md-12 col-lg-2"  href="index.php?&pg=logout">Sair</a>
        </form>
        <?php
      }elseif ($_SESSION['logado'] == 2){
        // Usuário postador
        // Gisele é a mais linda
        ?>
      <form class="form-inline my-1 mx-1 ml-2">
          <a class="btn btn-success my-1 mr-1 col-sm-3 col-md-12 col-lg-9" href="index.php?&pg=adm">Painel de postagem</a>
          <a class="nav-link text-center my-1 mr-1 col-sm-3 col-md-12 col-lg-2" href="index.php?&pg=logout">Sair</a>
      </form>
      <?php
      }elseif ($_SESSION['logado'] == 3){
        // Webmaster
      ?>
      <form class="form-inline my-1 mx-1 ml-2">
          <a class="btn btn-success my-1 mr-1 col-sm-3 col-md-12 col-lg-9" href="index.php?&pg=adm">Painel administrador</a>
          <a class="nav-link text-center my-1 mr-1 col-sm-3 col-md-12 col-lg-2" href="index.php?&pg=logout">Sair</a>
      </form>
    <?php }else{ 
      // Normal ?>
      <form class="form-inline my-1 mx-1 ml-2">
          <a class="btn btn-success my-1 mr-1 col-sm-3 col-md-12 col-lg-4" href="index.php?&pg=login">Entrar</a>
          <a class="btn btn-success my-1 mr-1 col-sm-3 col-md-12 col-lg-7" href="index.php?&pg=cadastro">Cadastre-se</a>
      </form>
    <?php } ?>
  </div>
</nav>