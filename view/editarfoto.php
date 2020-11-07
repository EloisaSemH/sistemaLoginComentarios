<?php
    if ($_SESSION['logado'] != 2 && $_SESSION['logado'] != 3) {
        ?>
        <script type="text/javascript">
            alert("Faça login para acessar esta página");
            document.location.href = "index.php?&pg=login";
        </script>
        <?php
    }

    if(isset($_GET['id'])){
        $foto_cod = $_GET['id'];
    }else{
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?&pg=fotos&pagina=1";
        </script>
        <?php
    }

    require_once ("db/classes/DAO/fotoDAO.class.php");
    $fotoDAO = new fotoDAO();

    $foto = $fotoDAO->pegarFoto($foto_cod);
?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form name="editarfoto" action="" method="post" enctype="multipart/form-data">
                <div class="form-row justify-content-center">
                    <?php if (file_exists('img/fotos/' . $foto['foto_img']) && !is_null($foto['foto_img'])) { ?>
                        <img src="img/fotos/<?php echo $foto['foto_img']; ?>" class="d-block w-100" height="50%"/>
                    <?php } else { ?>
                        <img src="img/fotos/erro.jpg" class="d-block w-100" height="50%"/>
                    <?php } ?>
                </div> 
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Título: *</label>
                        <input type="text" name="foto_titulo" required="" class="form-control" max="128" value="<?php echo $foto['foto_titulo']; ?>"/>
                    </div>
                </div>                          
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label>Descrição:</label>
                        <textarea style="height: 200px;" name="foto_desc" class="form-control"><?php echo $foto['foto_desc']; ?></textarea>
                    </div>
                </div>
                <?php if (!file_exists('img/fotos/' . $foto['foto_img']) || is_null($foto['foto_img'])) { ?>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3">
                            <label>Houve algum erro na imagem. Por favor, envie uma substituta: * </label><br/>
                            <input type="file" name="foto_img" class="form-control" accept="image/png, image/jpeg" required=""/>
                        </div>
                    </div>
                <?php } ?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-8">
                        <label class="text-danger">* Item obrigatório</label>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Atualizar foto" id="atualizar" name="atualizar" class="btn btn-outline-dark">
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3 text-center">
                        <input type="submit" value="Excluir foto" id="excluir" name="excluir" class="btn btn-danger">
                    </div>
                </div>            
<?php
if (isset($_POST["atualizar"])) {
    require_once ("db/classes/Entidade/fotos.class.php");
    $fotos = new fotos();

    $fotos->setGal_cod($foto_cod);
    $fotos->setGal_titulo($_POST['foto_titulo']);
    $fotos->setGal_desc($_POST['foto_desc']);
    $fotos->setGal_img($foto['foto_img']);

    if(isset($_FILES['foto_img'])){
        if(!is_null($_FILES['foto_img']['name'])){
            if($_FILES['foto_img']['error'] == 1){
                ?>
                <script type="text/javascript">
                    alert("Desculpe, houve um erro ao enviar a imagem. Envie uma imagem diferente e tente novamente.");
                </script>
                <?php
                die();
            }else{
                $imagem = $_FILES['foto_img'];

                $data = date("Y/m/d");
                $hora = date("H:i:s");

                $extensao = pathinfo ($imagem['name'], PATHINFO_EXTENSION);
                $extensao = '.' . strtolower ($extensao);

                $novadata = str_replace("/", "", $data);
                $novahora = str_replace(":", "", $hora);
                
                $nomeimagem = 'foto_' . $novadata . $novahora . $extensao;

                if(!is_null($foto['foto_img']) && $foto['foto_img'] == 'NULL'){
                    unlink('img/fotos/' . $foto['foto_img']);
                }

                $verf = move_uploaded_file($imagem['tmp_name'], 'img/fotos/' . $nomeimagem);

                if($verf == 1){
                    $fotos->setfoto_img($nomeimagem);
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("Ocorreu algum erro ao enviar a imagem, por favor, tente novamente");
                        document.location.href = "index.php?&pg=editarfoto&id=<?php echo $foto_cod; ?>";
                    </script>
                    <?php
                    die();
                }
            }
        }
    }

    if ($fotoDAO->atualizarFoto($fotos)) {
        ?>
        <script type="text/javascript">
            alert("Foto atualizada com sucesso!");
            document.location.href = "index.php?&pg=foto&id=<?php echo $foto_cod; ?>";
        </script>
        <?php
    }else{
    ?>
    <script type="text/javascript">
        alert("Desculpe, houve um erro ao atualizar a foto, contate o Webmaster para resolvê-lo. Código: ATTGAL01");
    </script>
    <?php
    }
}

if(isset($_POST['excluir'])){
    ?>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-3 text-center">
            <div class="alert alert-warning" role="alert">Você tem certeza que quer excluir a foto?<br/>(A ação não poderá ser desfeita)
                <input type="submit" value="Sim" id="confirmaexcluirSIM" name="confirmaexcluirSIM" class="btn btn-outline-danger mt-1">
                <input type="submit" value="Cancelar" id="confirmaexcluirNAO" name="confirmaexcluirNAO" class="btn btn-outline-secondary mt-1">
            </div>
        </div>
    </div>
    <?php 
}
if(isset($_POST['confirmaexcluirSIM'])){
    require_once ("db/classes/Entidade/fotos.class.php");
    $fotos = new fotos();

    $fotos->setGal_cod($foto_cod);

    if ($fotoDAO->excluirFoto($fotos)) {
        ?>
        <script type="text/javascript">
            alert("Foto excluida com sucesso!");
            document.location.href = "index.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Desculpe, houve um erro ao excluir a foto, contate o Webmaster para resolvê-lo. Código: EXNOT01");
        </script>
        <?php
    }
}
?>
                <div class="form-row justify-content-center">
					<div class="form-group col-md-3 text-center">
                        <a class="btn btn-link" href="index.php?&pg=foto&id=<?php echo $foto_cod; ?>">Voltar</a>
					</div>
				</div>
            </form>
        </div>
    </div>
</div>