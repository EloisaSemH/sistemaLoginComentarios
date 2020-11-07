<footer class="page-footer mt-3">
  <div style="background-color: #3C4448;">
    <div class="container">
      <div class="row py-4 d-flex align-items-center">
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0 text-white">Italianos em Itu: da imigração à atualidade.</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center text-md-left mt-2">
    <div class="row mt-3 text-secondary">
      <!-- Sobre -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
        <h6 class="text-uppercase font-weight-bold text-dark">Sobre</h6>
        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Site elaborado gratuitamente especialmente para o grupo Italianos em Itu, na intenção de divulgar o livro "Italianos em Itu: da imigração à atualidade".</p>
        <p class="font-weight-light font-italic">Todo o dinheiro arrecadado com a venda dos livros é destinado ao Lar N. Sra. da Candelária.</p>
      </div>
    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold text-dark">Links Úteis</h6>
        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
  <?php if($_SESSION['logado'] != 0){ ?>
        <p><a class="text-secondary" href="index.php?&pg=usuariopg">Sua conta</a></p>
  <?php } ?>
        <p><a class="text-secondary" href="https://www.facebook.com/pages/category/Nonprofit-Organization/Asilo-Mendicidade-Nossa-Senhora-da-Candel%C3%A1ria-175852372574937/" target="_blank">Lar N. Sra. da Candelária</a></p>
        <p><a class="text-secondary" href="#" title="Em breve!">(Em breve) Compre o ebook!</a></p>
        <p><a class="text-secondary" href="http://download2265.mediafire.com/i61zfpekhzzg/r2zxqrf2rr2za9u/Manual+de+instru%C3%A7%C3%B5es+do+website+Italianos+em+Itu.pdf" title="Download do manual de instruções do website Italianos em Itu" target="_blank">Baixe o manual do site</a></p>
    </div>
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-2">
        <!-- Contato -->
        <h6 class="text-uppercase font-weight-bold text-dark">Contato</h6>
        <hr class="teal accent-3 mb-3 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p><a class="text-secondary" href="https://www.facebook.com/italianosemitu/" title="Página no Facebook do Grupo Italianos em Itu">Facebook</a></p>
        <p>italianosemitu@gmail.com</p>
        <!-- <p> <i></i>Telefone</p> -->
      </div>
    </div>
  </div>
  <!-- Copyright -->
  <div  style="background-color: #3C4448;" class="footer-copyright text-center py-3 text-white align-self-center">
    <a href="https://github.com/EloisaSemH/tcctw" target="_blank"><img src="img/github-logo.png" class="mr-2"/></a>
    Site elaborado por: <a href="#" class="font-weight-bold text-white" target="_blank">Caio Andrade</a>, <a href="http://instagram.com/EloisaSemH" class="font-weight-bold text-white" target="_blank">Eloísa Carvalho</a>, <a href="#" class="font-weight-bold text-white" target="_blank">Enrique Gomes</a> e <a href="#" class="font-weight-bold text-white" target="_blank">Érica Vitória</a>. 2018-<?= date("Y")?>; Todos os direitos reservados.
  </div>
</footer>
<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>