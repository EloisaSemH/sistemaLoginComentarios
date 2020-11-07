<?php
	if(isset($_GET['search'])){
        $pesquisa = $_GET['search'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=!";
        </script>
        <?php
	}
	
    $pg = $_GET['pagina'];

    require_once ("db/classes/DAO/noticiasDAO.class.php");
    $noticiasDAO = new noticiasDAO();

	$numnoticias = $noticiasDAO->pesquisarNoticiasQnt($pesquisa);

	$qntporpag = 12;

    $numpags = ceil($numnoticias/$qntporpag);

    $inicio = ($qntporpag*$pg)-$qntporpag;
?>
<div class="container-fluid mt-2">
  	<div class="container">
        <div class="row justify-content-center">
			<?php
			if($_GET['search'] != ''){
				$res = $noticiasDAO->pesquisarNoticias($pesquisa, $inicio, $qntporpag);
				if(!is_null($res)){ ?>
					<h5 class="mt-3">Desculpe, não foi possível encontrar resultados com base nas palavras pesquisadas.</h5>
				<?php }}else{ ?>
					<h5><p>Pesquisa nula, por favor, digite palavras relacionadas ao que procura na barra de pesquisa.</p></h5>
				<?php } ?>
        </div>
        <?php
			$pagina_anterior = $pg - 1;
			$pagina_posterior = $pg + 1;
	    ?>
        <nav aria-label="Page navigation example" class="mt-3">
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<?php
					if($pagina_anterior != 0){ ?>
						<a href="index.php?&pg=noticias&pagina=<?php echo $pagina_anterior; ?>&search=<?php echo $pesquisa; ?>" aria-label="Previous" class="page-link">
							<span aria-hidden="true">&laquo;</span>
						</a>
					<?php }else{ ?>
						<span aria-hidden="true" class="page-link">&laquo;</span>
				<?php }  ?>
				</li>
				<?php 
				for($i = 1; $i < $numpags + 1; $i++){ ?>
					<li class="page-item"><a href="index.php?&pg=noticias&pagina=<?php echo $i; ?>&search=<?php echo $pesquisa; ?>" class="page-link"><?php echo $i; ?></a></li>
				<?php } ?>
				<li class="page-item">
					<?php
					if($pagina_posterior <= $numpags){ ?>
						<a href="index.php?&pg=noticias&pagina=<?php echo $pagina_posterior; ?>&search=<?php echo $pesquisa; ?>" aria-label="Previous" class="page-link">
							<span aria-hidden="true" >&raquo;</span>
						</a>
					<?php }else{ ?>
						<span aria-hidden="true" class="page-link">&raquo;</span>
				<?php }  ?>
				</li>
			</ul>
		</nav>
  	</div>
</div>