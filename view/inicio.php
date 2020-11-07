<?php
require_once ("db/classes/DAO/noticiasDAO.class.php");
$noticiasDAO = new noticiasDAO();
?>
<!-- Os slides -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
      $numcar = $noticiasDAO->contarCarrossel();
      for($i = 0; $i < $numcar; $i++){
        switch($i){
          case 0:
            $classe = 'class="active"';
            break;
          default:
            $classe = '';
            break;
        }
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="'. $i .'"'. $classe .'></li>';
      }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php $noticiasDAO->carrossel(); ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>

<!-- Sobre 1 -->
<div class="col-sm-4 float-left mt-2">
  <div class="card text-center">
      <div class="card-header">
        Edson Carlos
      </div>
      <!-- <div style="width: 502px, heigh: 412px"> -->
        <img src="img/edsonefatima.png" alt="Edson Carlos" class="img-fluid" style="width: 502px, heigh: 412px">
      <!-- </div> -->
      <div class="card-footer text-muted">
      Edson Carlos de Oliveira é conferencista e engenheiro.
      <br/>Publicação: Família Lunardon e suas raízes italianas, lançado em Itu, em Veneza e em Bassano del Grappa – Itália.
      </div>
  </div>
</div>
<!-- Sobre 2 -->
<div class="col-sm-4 float-left mt-2">
  <div class="card text-center">
      <div class="card-header">
        Maria de Fátima
      </div>
        <img src="img/edsonefatima.png" alt="Maria de Fátima" class="img-fluid" style="width: 502px, heigh: 412px">
      <div class="card-footer text-muted">
      Maria de Fátima Boni Oliveira é advogada e pesquisadora da Imigração italiana.
      <br/> Publicações: Família Lunardon e suas raízes italianas em co-autoria. Vozes ítalo-brasileiras I -2016 e Vozes ítalo-brasileiras II.
      </div>
  </div>
</div>
<!-- Sobre 3 -->
<div class="col-sm-4 float-left my-2">
  <div class="card text-center">
      <div class="card-header">
        Vilma Pavão
      </div>
        <img src="img/vilma.png" alt="Vilma Pavão" class="img-fluid" style="width: 502px, heigh: 412px">
      <div class="card-footer text-muted">
      Vilma Pavão Folino, pedagoga e psicopedagoga aposentada, trabalhou na área de educação nos diversos níveis, do pré-escolar ao superior. Seu conto “Patrimônio que transcende tempo e espaço” foi selecionado para publicação pelo II Concurso Literário Brasil-Itália, COMITES, 2017.
      </div>
  </div>
</div>
<!-- Sobre o livro -->
<div class="mt-2 col-12">
  <div class="card">
    <div class="card-header">
      Italianos em Itu: da imigração à atualidade
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>Este livro tem a finalidade de preservar as memórias dos imigrantes italianos e seus descendentes na cidade de Itu. São quase 70 autores que compartilham com emoção suas vivências familiares.
<br/>Os textos foram agrupados por Região da Itália o que facilita observar as semelhanças e particularidades entre os relatos das famílias de diversas origens.</p>
        <footer class="blockquote-footer">Edson Carlos, Maria de Fátima e Vilma Pavão. <cite title="Source Title">2017</cite></footer>
      </blockquote>
    </div>
  </div>
</div>