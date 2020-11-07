<?php
    if(isset($_GET['id'])){
        $gal_cod = $_GET['id'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=galeria&pagina=1";
        </script>
        <?php
    }

    require_once ("db/classes/DAO/galeriaDAO.class.php");
    $galeriaDAO = new galeriaDAO();

    $foto = $galeriaDAO->pegarFoto($gal_cod);
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="foto" action="" method="post" enctype="">
                 <div class="form-row justify-content-center">
                    <h2><div class="p-3 mb-2 bg-white text-dark"><?php echo $foto['gal_titulo']; ?></div></h2>
                </div>

                 <div class="border-top pt-2">
                    <div class="form-row justify-content-center">
                        <?php if (file_exists('img/galeria/' . $foto['gal_img']) && !is_null($foto['gal_img'])) { ?>
                            <img src="img/galeria/<?php echo $foto['gal_img']; ?>" class="d-block w-100" height="50%"/>
                        <?php }else{ ?>
                            <img src="img/galeria/semfoto.jpg" class="d-block w-100" height="50%"/>
                        <?php } ?>
                    </div>               

                    <div class="form-row justify-content-center">
                        <?php if(!is_null($foto['gal_desc'])){ ?>
                            <div class="p-3 mb-2 bg-white text-dark"><?php echo $foto['gal_desc'] ?></div>
                        <?php } ?>
                    </div>                
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3 text-center">
                            <a href="index.php?&pg=galeria" class="btn btn-link">Voltar</a>
                            <?php
                                if($_SESSION['logado'] == 2 || $_SESSION['logado'] == 3){
                                    echo '<a class="btn btn-link" href="index.php?&pg=editarfoto&id=' . $gal_cod . '">Editar</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>